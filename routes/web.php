<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GymOwner\GymOwnerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [Controller::class, 'index'])->name('welcome');
Route::get('/find-gym', [Controller::class, 'index2'])->name('findgym');
Route::get('/about', [Controller::class, 'index3'])->name('about');

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
        ->middleware(\App\Http\Middleware\Admin::class)
        ->name('admin.logout');
});

/* Gym Owner */
Route::prefix('gymowner')->group(function () {
    Route::get('/login', [GymOwnerController::class, 'login'])->name('gymowner.login');
    Route::post('/login', [GymOwnerController::class, 'authenticate'])->name('gymowner.login.submit');
    Route::get('/register', [GymOwnerController::class, 'showRegistrationForm'])->name('gymowner.register');
    Route::post('/register', [GymOwnerController::class, 'register'])->name('gymowner.register.submit');
    Route::get('/dashboard', [GymOwnerController::class, 'dashboard'])
        ->middleware(\App\Http\Middleware\GymOwner::class)
        ->name('gymowner.dashboard');
    Route::post('/logout', [GymOwnerController::class, 'logout'])
        ->middleware(\App\Http\Middleware\GymOwner::class)
        ->name('gymowner.logout');
});

require __DIR__.'/auth.php';
