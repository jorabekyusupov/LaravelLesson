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
Route::get( '/order/products', [\App\Http\Controllers\OrderController::class, 'OrderProductsIndex'])->name('orders.products');
