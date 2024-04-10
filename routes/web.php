<?php

use App\Http\Controllers\ItemController;
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
        Route::resource('orders', ItemController::class)->parameters(['items' => 'item:slug']);

        Route::get('/dashboard', function () {
            $user = auth()->user();
            return view('admin.dashboard', ['email' => $user->email, 'address' => $user->address]);
        })->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');
        
    });

require __DIR__ . '/auth.php';
