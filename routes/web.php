<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/brands', [App\Http\Controllers\BrandController::class, 'index'])->name('brands.index');
Route::post('/brand/save', [App\Http\Controllers\BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/delete/{id}', [App\Http\Controllers\BrandController::class, 'destroy']);
Route::get('/brand/edit/{id}', [App\Http\Controllers\BrandController::class, 'edit']);
Route::post('/brand/update/{id}', [App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::post('/product/save', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/product/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
