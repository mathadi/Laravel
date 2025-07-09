<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Settings\ProfileController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

    
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard',[TaskController::class, 'index'])->name('dashboard');
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/tasks/create', [TaskController::class, 'showForm'])->name('tasks.create');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/tasks/{id}', [TaskController::class, 'getTask'])->name('tasks.store');
        Route::get('/tasks/{id}/edit', [TaskController::class, 'editForm'])->name('tasks.edit');
        Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__.'/settings.php';



