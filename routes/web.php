<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class,'edit'])->name('users.edit');
Route::put('/users/update/{id}', [UserController::class,'update'])->name('users.update');
Route::delete('/users/delete/{id}', [UserController::class,'delete'])->name('users.delete');
Route::get('/orders', [UserController::class, 'index_order'])->name('orders.index');
Route::get('/orders/create', [UserController::class, 'create_order'])->name('orders.create');
Route::post('/orders/store', [UserController::class, 'store_order'])->name('orders.store');
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
Route::delete('/categories/delete/{id}', [\App\Http\Controllers\CategoryController::class,'delete'])->name('categories.delete');
Route::get('/categories/edit/{id}', [\App\Http\Controllers\CategoryController::class,'edit'])->name('categories.edit');
Route::put('/categories/update/{id}', [\App\Http\Controllers\CategoryController::class,'update'])->name('categories.update');
Route::get('/regions', [\App\Http\Controllers\RegionController::class, 'index'])->name('regions.index');
Route::get('/regions/create', [\App\Http\Controllers\RegionController::class, 'create'])->name('regions.create');
Route::post('/regions/store', [\App\Http\Controllers\RegionController::class, 'store'])->name('regions.store');
Route::delete('/regions/delete/{id}', [\App\Http\Controllers\RegionController::class,'delete'])->name('regions.delete');
Route::get('/regions/edit/{id}', [\App\Http\Controllers\RegionController::class,'edit'])->name('regions.edit');
Route::put('/regions/update/{id}', [\App\Http\Controllers\RegionController::class,'update'])->name('regions.update');
Route::get('users/search',[UserController::class,'search'])->name('users.search');
Route::get( '/order/products', [\App\Http\Controllers\OrderController::class, 'OrderProductsIndex'])->name('orders.products');
