<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;

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


//Connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Inscription
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

// créer une boutique
Route::post('/store', [StoreController::class, 'create'])->middleware('auth')->name('store.create');



$baseDomain = parse_url(config('app.url'), PHP_URL_HOST);

// afficher une boutique via sous-domaine
Route::domain('{store}.' . $baseDomain)->group(function () {
    Route::get('/', [StoreController::class, 'show'])->name('store.show');
});
