<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard and To-Do list routes (only for authenticated users)
Route::middleware(['auth', 'auth.role'])->group(function () {
    Route::get('/dashboard', [TodoController::class, 'dashboard'])->name('dashboard');


    // To-Do list routes
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::post('/todos/store', [TodoController::class, 'store'])->name('todos.store');
    Route::put('/todos/update/{id}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/todos/delete/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
    Route::patch('/todos/toggle-complete/{id}', [TodoController::class, 'toggleComplete'])->name('todos.toggleComplete');
});

// Profile routes (only for authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__ . '/auth.php';
