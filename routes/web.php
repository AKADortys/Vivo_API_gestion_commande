<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

// routes/web.php
Route::get('/', function () {
    return view('home');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register']);
});

Route::prefix('order')->group(function () {
    Route::get('user/{userid}/articles/{categoryid}', [OrderController::class, 'showOrderView'])->name('category.articles');
    Route::post('user/orders/articles/add', [OrderController::class, 'addArticlesToOrder'])->name('orders.addArticle');
    Route::post('user/orders/article/remove', [OrderController::class, 'removeArticlesToOrder'])->name('orders.removeArticle');
    Route::post('user/orders/confirm', [OrderController::class, 'confirmOrder'])->name('orders.confirm');
});


// Route pour la déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');




Route::prefix('admin')->group(function(){
    
    Route::get('/welcome', function () {
        return view('welcome');
    });

});
