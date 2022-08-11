<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Resources\BookController;
use App\Http\Controllers\Resources\UserController;


// home page page
Route::get('/', [HomePageController::class, 'index'])->name('home');

//Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');  //form
Route::post('/login', [LoginController::class, 'store']);  //login
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');  //logout

Route::get('/register', [RegisterController::class, 'index'])->name('register');  //form
Route::post('/register', [RegisterController::class, 'store']); //register


/*
Routes for displaying lists of products
*/
Route::resource('books', BookController::class, ['except' => ['index', 'show']]);
Route::prefix('books')->group(function(){
  Route::get('/show/{book}', [BookController::class, 'show'])->name('books.show'); // Fixes books.show hijacking books.index/category/null
  Route::get('/{category?}/{subcategories?}', [BookController::class, 'index'])->name('books.index');
});


/*
Routes only logged in users can access
redirects to login page if unauthorized
*/
Route::middleware('auth', 'private')->group(function () {
Route::resource('users', UserController::class);
});

/*
Routes only administrators can access
Throws 403 if unauthorized
*/
Route::middleware('admin')->prefix('admin')->group(function () {


});
