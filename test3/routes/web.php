<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\OwnerProductController;
use App\Http\Controllers\OwnerRegisterController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\ProductCommentsController;
use App\Http\Controllers\ProductConfirmController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUpvoteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

// Password Reset User
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


// Password Update

Route::post('/reset-password', function (Request $request) {

    $attributes = $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => $password
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );



    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

//Route::post('reset-password', [NewPasswordController::class, 'store'])->middleware('guest')->name('password.update');

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

//Route::get('/test', function (){
//    dd(Auth::user()->id);
//});
