<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetPasswordController;
use App\Http\Controllers\UserController;
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


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', HomeController::class)->name('index');
    Route::post('logout', LogoutController::class)->name('logout');

    
    // User
    Route::resource('users', UserController::class)->names('user');
    Route::get('users/{user}/reset-password/', [UserController::class, 'viewResetPassword'])->name('viewResetPassword');
    Route::post('users/{user}/reset-password/', [UserController::class, 'storeResetPassword'])->name('storeResetPassword');

    // Book
    Route::resource('books', BookController::class)->names('book');

    
});


Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::post('login', LoginController::class)->name('auth');
});
