<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    return view('admin.dashboard', ['email' => $user->email, 'address' => $user->address]);
})->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');


Route::middleware('auth', 'admin')
->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
       Route::resource('items',ItemController::class);
       Route::resource('tags',TagController::class)->parameters(['tags' => 'tag:slug']);
       Route::resource('categories',CategoryController::class)->parameters(['categories' => 'category:slug']);
       

        Route::get('/dashboard', function () {
            $user = auth()->user();
            return view('admin.dashboard', ['email' => $user->email, 'address' => $user->address]);
        })->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');
        
    });

require __DIR__ . '/auth.php';
