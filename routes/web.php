<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;


Route::get('/', [OrderController::class, 'index']);


Route::get ('/orders', [OrderController::class, 'index']);


Route::get ('/orders/detail/{id}', [OrderController::class, 'detail']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/orders/add', [OrderController::class, 'add']);

Route::post('/orders/add', [OrderController::class, 'create']);

Route::get('/orders/delete/{id}', [OrderController::class, 'delete']);

Route::post('/comments/add', [CommentController::class, 'create']);

Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);
    