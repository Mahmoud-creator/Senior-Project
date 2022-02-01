<?php

use App\Http\Controllers\ProductCommentsController;
use App\Http\Controllers\ProductConfirmController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLikeController;
use App\Http\Controllers\ProductUpvoteController;
use App\Http\Controllers\ProductVerifyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Upvote;
use Illuminate\Support\Facades\Route;

// Home view page
Route::get('/', [ProductController::class, 'index'])->middleware('auth')->name('home');

// Post view page
Route::get('products/{product:slug}', [ProductController::class, 'show'])->middleware('auth')->name('product.show');

// Register page
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


// Login Logout
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

//mahmoudshawish2020@gmail.com

// Comment
Route::post('/products/{product:slug}/comments', [ProductCommentsController::class, 'store']);


// Upvote Product
Route::post('/product/{product}/upvotes', [ProductUpvoteController::class, 'store'])->name('product.upvote');

// Verify Product
Route::post('/product/{product}/confirm', [ProductConfirmController::class, 'store'])->name('product.confirm');
