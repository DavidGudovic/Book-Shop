<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomePageController;

// home page page
Route::get('/', [HomePageController::class, 'index'])->name('home');

//Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');  //form
Route::post('/login', [LoginController::class, 'store']);  //login
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');  //logout

Route::get('/register', [RegisterController::class, 'index'])->name('register');  //form
Route::post('/register', [RegisterController::class, 'store']); //register
