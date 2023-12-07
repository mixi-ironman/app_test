<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/',[ProductController::class,'home'])->name('home');


    Route::get('/login-page',[AuthController::class,'loginForm'])->name('login-page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register-page',[AuthController::class,'registerForm'])->name('register-page');
    Route::post('/register',[AuthController::class,'register'])->name('register');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

//Product
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/api/v1/product/list', [ProductController::class, 'apiList']);
    Route::put('/api/v1/product/update/{id}', [ProductController::class, 'update'])->name('api.products.update');
    Route::delete('/api/v1/product/delete/{id}', [ProductController::class, 'destroy'])->name('api.products.destroy');
