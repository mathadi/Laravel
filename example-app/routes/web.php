<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'index']);
Route::get('/contact-us', [PagesController::class, 'contact']);
Route::get('/about-us', [PagesController::class, 'about']);
Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/no-articles', [ArticlesController::class, 'noArticles']);
Route::get('/article', [ArticlesController::class, 'article']);
Route::get('/articles/{article}', [ArticlesController::class, 'show']);
Route::get('/create-article', [ArticlesController::class, 'create']);
Route::get('/article_form', [ArticlesController::class, 'article_form']);