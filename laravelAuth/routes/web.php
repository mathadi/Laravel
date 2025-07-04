<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');
Route::get('/login', [AuthController::class, 'loginView'])
    ->name('login.view');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register');
Route::get('/register', [AuthController::class, 'registerView'])
    ->name('register.view');

    Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::post('/user/edit/{user}', [AuthController::class, 'edit'])
    ->name('user.edit');
Route::post('/user/delete/{user}', [AuthController::class, 'delete'])
    ->name('user.delete');

Route::get('/index', [AuthController::class, 'index'])
    ->name('users.index');

Route::resource('posts', PostController::class);