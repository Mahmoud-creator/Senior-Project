<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerProductController;
use App\Http\Controllers\OwnerRegisterController;
use App\Http\Controllers\ProductCommentsController;
use App\Http\Controllers\ProductConfirmController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUpvoteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;


// Home view page
Route::get('/', [ProductController::class, 'index'])->name('home');

// Product view page
Route::get('products/{product:slug}', [ProductController::class, 'show'])->name('product.show');


// Register page
Route::get('/User-register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/User-register', [RegisterController::class, 'store'])->middleware('guest');

// User-Register page
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::get('/register-owner', [OwnerRegisterController::class, 'create'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/register-owner', [OwnerRegisterController::class, 'store'])->middleware('guest');


// Login User
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware();


// Login Owner
Route::get('/login-owner', [SessionsController::class, 'createOwner'])->middleware('guest')->name('Ownerlogin');
Route::post('/login-owner', [SessionsController::class, 'storeOwner'])->middleware('guest');
Route::post('/logout-owner', [SessionsController::class, 'destroyOwner'])->middleware('owner');


// Comment
Route::post('/products/{product:slug}/comments', [ProductCommentsController::class, 'store']);
Route::delete('/products/{product}/comment:{comment}/delete', [ProductCommentsController::class, 'destroy']);


// Upvote Product
Route::post('/product/{product}/upvotes', [ProductUpvoteController::class, 'store'])->name('product.upvote');

// Verify Product
Route::post('/product/{product}/confirm', [ProductConfirmController::class, 'store'])->name('product.confirm');

// Owners
Route::get('/owners:{owner}/dashboard', [OwnerProductController::class, 'index'])->middleware('owner')->name('owner.dashboard');
Route::get('/owners:{owner}/create', [ProductController::class, 'create'])->middleware('owner');
Route::post('/owner/products', [OwnerProductController::class, 'store'])->middleware('owner');
Route::post('/owner:{owner}/product:{product}/confirm', [OwnerProductController::class, 'confirm'])->middleware('owner');
Route::delete('/owner:{owner}/product:{product}/delete', [OwnerProductController::class, 'destroy'])->middleware('owner');

Route::get('/owner:{owner}/product:{product}/edit', [OwnerProductController::class, 'edit'])->middleware('owner');
Route::patch('/owner/product:{product:id}/update', [OwnerProductController::class, 'update'])->middleware('owner');

// Admin

Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('auth');
Route::get('/admin/products', [AdminController::class, 'products'])->middleware('auth');
Route::get('/admin/comments', [AdminController::class, 'comments'])->middleware('auth');

Route::post('/admin/shop:{shop}/confirm', [AdminController::class, 'confirm'])->middleware('auth');
Route::delete('/admin/shop:{shop}/delete', [AdminController::class, 'destroy'])->middleware('auth');

Route::post('/admin/product:{product}/confirm', [AdminController::class, 'confirmP'])->middleware('auth');
Route::delete('/admin/product:{product}/delete', [AdminController::class, 'destroyP'])->middleware('auth');

