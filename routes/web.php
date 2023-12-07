<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
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

Route::get('/login-page',[AuthController::class,'loginForm'])->name('login-page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register-page',[AuthController::class,'registerForm'])->name('register-page');
    Route::post('/register',[AuthController::class,'register'])->name('register');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
