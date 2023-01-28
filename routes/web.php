<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('@{username}', [UserController::class, 'show']);

Route::get('/follow', [UserController::class,'follow']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('user/edit', [UserController::class, 'edit']);
    Route::put('user/edit', [UserController::class, 'update']);
    Route::resource('post', PostController::class);
});
