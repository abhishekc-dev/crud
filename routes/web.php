<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UserController::class, 'create'])->name('create.user');
Route::post('/', [UserController::class, 'store'])->name('create.user');
Route::get('/users', [UserController::class, 'index'])->name('list.user');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('delete.user');
Route::get('/user/{id}', [UserController::class, 'edit'])->name('edit.user');
Route::put('/user/{id}', [UserController::class, 'update'])->name('update.user');