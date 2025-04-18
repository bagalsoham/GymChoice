<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 
/* Admin */
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.login.submit');    
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->middleware(\App\Http\Middleware\Admin::class)
        ->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])
        ->middleware('admin')->name('admin.logout');
});

require __DIR__.'/auth.php';
