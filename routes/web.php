<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GymOwner\GymOwnerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [Controller::class, 'index'])->name('welcome');
Route::get('/find-gym', [Controller::class, 'index2'])->name('findgym');
Route::get('/about', [Controller::class, 'index3'])->name('about');
Route::get('/contact', [Controller::class, 'contact'])->name('contact');

// Comment out the simple dashboard route
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Use the UserController for dashboard instead
Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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
    Route::post('/logout', [AdminController::class, 'logout'])
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
        ->middleware(\App\Http\Middleware\GymOwnerMiddleware::class)
        ->name('gymowner.dashboard');
    Route::post('/logout', [GymOwnerController::class, 'logout'])
        ->middleware(\App\Http\Middleware\GymOwnerMiddleware::class)
        ->name('gymowner.logout');
});

/* User Routes - if you want to use custom controller instead of default Breeze */
// Route::get('/user/register', [UserController::class, 'showRegistrationForm'])->name('user.register');
// Route::post('/user/register', [UserController::class, 'register'])->name('user.register.submit');
// Route::get('/user/dashboard', [UserController::class, 'dashboard'])
//     ->middleware('user')
//     ->name('user.dashboard');
// Route::get('/user/logout', [UserController::class, 'logout'])
//     ->middleware('user')
//     ->name('user.logout');

require __DIR__.'/auth.php';
