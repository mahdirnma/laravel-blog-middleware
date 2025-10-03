<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::middleware('auth')->group(function () {
    Route::get('/',[UserController::class,'index'])->name('home');
    Route::resource('posts',PostController::class)->only('index');
    Route::resource('categories',CategoryController::class)->only('index');
    Route::resource('tags',TagController::class)->only('index');
    Route::middleware('isAdmin')->group(function () {
        Route::resource('posts',PostController::class)->only('destroy');
        Route::resource('categories',CategoryController::class)->except('index');
        Route::resource('tags',TagController::class)->except('index');
    });
    Route::middleware('isWriter')->group(function () {
        Route::resource('posts',PostController::class)->only('create','store','update','edit');
    });
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});
Route::middleware('guest')->group(function () {
    Route::get('/login',[AuthController::class,'loginForm'])->name('login.form');
    Route::post('/login',[AuthController::class,'login'])->name('login');
    Route::get('/register',[AuthController::class,'registerForm'])->name('register.form');
    Route::post('/register',[AuthController::class,'register'])->name('register');
});
