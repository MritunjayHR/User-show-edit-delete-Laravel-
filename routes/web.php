<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});


Route::get('/users', [UserController::class, 'index'])->name('users.index'); 
Route::post('/users/search', [UserController::class, 'search'])->name('users.search'); 
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); 
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); 
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
