<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashBoardController;

// Routes pour les pages statiques
Route::view('/', 'home');
Route::view('/contact', 'info');
Route::view('/mention-legale', 'mention-legale');

// Routes pour l'authentification
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register']);
});

// Routes pour les commandes
Route::prefix('order')->name('orders.')->group(function () {
    Route::get('user/{userid}/articles/{categoryid}', [OrderController::class, 'showOrderView'])->name('category.articles');
    Route::post('user/orders/articles/add', [OrderController::class, 'addArticlesToOrder'])->name('addArticle');
    Route::post('user/orders/article/remove', [OrderController::class, 'removeArticlesToOrder'])->name('removeArticle');
    Route::post('user/orders/confirm', [OrderController::class, 'confirmOrder'])->name('confirm');
});

// Routes pour la gestion de l'utilisateur
Route::post('/update-user', [UserController::class, 'update'])->name('update-user');

// Route pour la déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route pour le tableau de bord
Route::get('/dashboard', [DashBoardController::class, 'dashboard']);

// Routes pour l'administration
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::view('/welcome', 'welcome');
});
