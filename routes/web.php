<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TrashedController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Guest Route
Route::get('/', [ShopController::class, 'index']);
Route::get('/{item:id}', [ShopController::class, 'show'])->name('show');


// Admin Route
Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        // middleware route for admin and not admin
        Route::get('/profile', function () {
            $user = auth()->user();
            return view('admin.profile', ['email' => $user->email, 'address' => $user->address]);
        })->middleware(['auth', 'verified', 'admin'])->name('profile');

        // route for item, tags and categoris
        Route::resource('items',ItemController::class);
        Route::resource('tags',TagController::class)->parameters(['tags' => 'tag:slug']);
        Route::resource('categories',CategoryController::class)->parameters(['categories' => 'category:slug']);

        // route for trashed items
        Route::get('trashed', [TrashedController::class, 'index'])->name('items.trashed');
        Route::get('trashed/{item:id}', [TrashedController::class, 'restore'])->withTrashed()->name('restore');
        Route::delete('trashed/{item:id}', [TrashedController::class, 'delete'])->withTrashed()->name('delete');
    });

require __DIR__ . '/auth.php';
