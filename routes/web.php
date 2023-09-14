<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ArticleController::class, 'index']);

Route::get('/articles', [ArticleController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
