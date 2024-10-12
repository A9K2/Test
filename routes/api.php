<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DestroyController;

Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::group([
    'namespace'=> 'Post', 
    'middleware' => 'jwt.auth',
], function(){

    Route::get('/posts', [IndexController::class, '__invoke']);
    Route::get('/posts/create', [CreateController::class, '__invoke']);
    Route::post('/posts', [StoreController::class, '__invoke']);
    Route::get('/posts/{post}', [ShowController::class, '__invoke']);
    Route::get('/posts/{post}/edit', [EditController::class, '__invoke']);
    Route::patch('/posts/{post}', [UpdateController::class, '__invoke']);
    Route::delete('/posts/{post}', [DestroyController::class, '__invoke']);
}
);