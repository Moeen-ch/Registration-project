<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidUser;
// use Faker\Guesser\Name;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Routes for Users

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'userLogin'])->name('post.login');

Route::get('home', [UserController::class, 'home'])
    ->name('home.page')->middleware(ValidUser::class);

Route::get('/register', [UserController::class, 'index'])->name('register.index');
Route::post('register', [UserController::class, 'store'])->name('register.store');

Route::get('show', [UserController::class, 'show'])
    ->name('get.show')->middleware(ValidUser::class);

Route::get('show/edit/{id}', [UserController::class, 'edit'])->name('get.edit');
Route::post('show/update/{id}', [UserController::class, 'update'])->name('post.update');
Route::get('show/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/dashboard', [UserController::class, 'userCount'])->name('dashboard');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


// ====================     Routes for User Orders

Route::get('/ordersView',[ProductController::class,'show'])->name('orders');
Route::get('/ordersView/edit/{id}',[ProductController::class,'edit'])->name('orders.edit');
Route::post('/ordersView/update/{id}',[ProductController::class,'update'])->name('orders.update');
Route::get('/ordersView/destroy/{id}',[ProductController::class,'destroy'])->name('orders.destroy');
Route::get('/createOrders', [ProductController::class,'ProductFormView'])->name('createOrders');
Route::post('/orderStore',[ProductController::class,'store'])->name('order.Store');
// Route::get('/showOrders',[ProductController::class,'show'])->name('show.orders');