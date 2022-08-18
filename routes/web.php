<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Resources\BookController;
use App\Http\Controllers\Resources\UserController;
use App\Http\Controllers\Resources\OrderController;
use App\Http\Controllers\Resources\ReclamationController;

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ReclamationController as AdminReclamationController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ReportController;

// TODO Localize route URLs to Serbian

// home page page
Route::get('/', [HomePageController::class, 'index'])->name('home');
//Authentication TODO Restify
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
  Route::resource('user.orders', OrderController::class);
  Route::resource('user.reclamations', ReclamationController::class);
});
/*
Routes only administrators can access
Throws 403 if unauthorized
*/
Route::middleware('admin')->prefix('admin')->group(function () {
  Route::resource('orders', AdminOrderController::class);
  Route::resource('reclamations', AdminReclamationController::class);
  Route::resource('users', AdminUserController::class);
  Route::resource('authors', AuthorController::class);
  Route::resource('reports', ReportController::class);
});
