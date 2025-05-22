<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/submit', [AuthController::class, 'registerSubmit'])->name('register.submit');
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/users', [AdminController::class, 'allUser'])->name('users');
    Route::delete('/user/{id}', [AdminController::class, 'destroyUser'])->name('delete.user');

    Route::get('/comments', [AdminController::class, 'allComment'])->name('comments');
    Route::delete('/comment/{id}', [AdminController::class, 'destroyComment'])->name('delete.comment');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('index.admin');
    Route::get('/product', [AdminController::class, 'allProduct'])->name('product');
    Route::get('/product/add', [AdminController::class, 'addProduct'])->name('add.product');
    Route::post('/add', [AdminController::class, 'store'])->name('add.submit');
    Route::get('/product/edit/{id}', [AdminController::class, 'edit'])->name('edit.product');
    Route::put('/edit/{id}', [AdminController::class, 'update'])->name('edit.submit');
    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('delete.product');
    Route::get('/information', [AdminController::class, 'information'])->name('information');

    Route::get('/store', [StoreController::class, 'index'])->name('index.store');
    Route::get('/product/{id}', [StoreController::class, 'productView'])->name('product.view');

    Route::post('/comment/add', [CommentController::class, 'addComment'])->name('add.comment');

    Route::get('/cart', [CartController::class,'cart'])->name('cart.index');
    Route::post('/addCart/{id}', [CartController::class, 'addCart'])->name('cart.add');
    Route::delete('/cart/delete/{id}', [CartController::class, 'deleteCart'])->name('cart.delete');
    Route::post('cart/{userId}/{productId}/{action}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
});


