<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Middleware\AdminPanelMiddleware;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('post.home');

Route::group(['namespace'=>'App\Http\Controllers\Admin', 'prefix'=>'admin'], function(){
   Route::middleware([AdminPanelMiddleware::class])->group(function(){
        Route::group(['namespace'=>'Post'], function(){
        Route::get('/post', 'IndexController')->name('admin.post.index');
        Route::get('/post/create', 'CreateController')->name('admin.post.create');
        Route::post('/post/store', 'StoreController')->name('admin.post.store');
        Route::get('/post/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/post/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/post/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/post/{post}', 'DestroyController')->name('admin.post.delete');

    });
   });
});

Route::group(['namespace'=>'App\Http\Controllers\Post'], function(){
    Route::get('/post', 'IndexController')->name('post.index');
    Route::get('/post/create', 'CreateController')->name('post.create');
    Route::post('/post', 'StoreController')->name('post.store');
    Route::get('/post/{post}', 'ShowController')->name('post.show');
    Route::get('/post/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/post/{post}', 'UpdateController')->name('post.update');
    Route::delete('/post/{post}', 'DestroyController')->name('post.delete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
