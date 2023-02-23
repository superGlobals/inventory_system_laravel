<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/login', [UserController::class, 'authentication'])->name('user.login');


Route::middleware(['auth'])->group(function() {
    
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(CategoryController::class)->group(function() {
        Route::get('/categories', 'index')->name('categories');
        Route::get('/category/add', 'add')->name('category.add');
        Route::post('/category', 'store')->name('category.store');
        Route::get('/category/{category}/edit', 'edit')->name('category.edit');
        Route::put('/category/{category}', 'update')->name('category.update');
        Route::delete('/category/{category}', 'destroy')->name('category.destroy');
    });

    Route::controller(ProductController::class)->group(function() {
        Route::get('/products', 'index')->name('products');
        Route::get('/product/add', 'add')->name('product.add');
        Route::post('/product', 'store')->name('product.store');
        Route::get('/product/{product}/edit', 'edit')->name('product.edit');
        Route::put('/product/{product}', 'update')->name('product.update');
        Route::delete('/product/{product}', 'destroy')->name('product.destroy');

    });


});
