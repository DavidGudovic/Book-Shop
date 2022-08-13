<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Resources\BookController;
use App\Http\Controllers\Resources\UserController;
use App\Http\Controllers\Resources\OrderController;
use App\Http\Controllers\Resources\ReclamationController;

// TODO Localize route URLs to Serbian

// home page page
Route::get('/', [HomePageController::class, 'index'])->name('home');

//Authentication
Route::resource('register', RegisterController::class, ['only' => ['create', 'store']]);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);  
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

/*
Routes for displaying lists of products
catalog/ route fixes books.show hijacking requests from books.index/param/null
*/
Route::get('catalog/{category?}/{subcategories?}', [BookController::class, 'index'])->name('books.index');
Route::resource('books', BookController::class, ['except' => 'index']);

/*
Routes only logged in users can access
redirects to login page if unauthorized
*/
Route::middleware('auth', 'private')->group(function () {
Route::get('/user/{user}/delete', [UserController::class, 'delete'])->name('user.delete');
Route::resource('user', UserController::class);
Route::resource('orders', OrderController::class);
Route::resource('reclamations', ReclamationController::class);
});

/*
Routes only administrators can access
Throws 403 if unauthorized
*/
Route::middleware('admin')->prefix('administration')->group(function () {


});
