<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('@{username}', [UserController::class, 'show']);

Route::get('/search', [HomeController::class, 'search']);


Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('user/edit', [UserController::class, 'edit']);
    Route::put('user/edit', [UserController::class, 'update']);
    Route::resource('post', PostController::class);

    Route::get('/follow/{user_id}', [UserController::class, 'follow']);
    Route::get('/like/{type}/{post_id}', [LikeController::class, 'toggle']);

    Route::get('/notification', [UserController::class, 'notification']);
    Route::get('/notification/seen', [UserController::class, 'notificationSeen']);

    //comment
    // Route::post('comment/{post_id}', [CommentController::class, 'store']);
    // Route::get('comment/{comment_id}/edit', [CommentController::class, 'edit']);
    // Route::put('comment/{comment_id}', [CommentController::class, 'update']);
    // Route::get('comment/{comment_id}/delete', [CommentController::class, 'delete']);

    //nested resource for comment
    Route::resource('post.comment', CommentController::class)->shallow();
});
