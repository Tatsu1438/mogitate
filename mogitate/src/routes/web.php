<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'products'])->name('products');
Route::get('/register', [ProductController::class, 'register'])->name('register');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.detail');
Route::post('/register', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');