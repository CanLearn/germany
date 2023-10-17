<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.layouts.main');
});

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->name('panel.')->prefix('panel')->group(function () {
    Route::get('/', [\App\Http\Controllers\Panel\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', \App\Http\Controllers\PostController::class)->except('show');
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('tags', \App\Http\Controllers\TagController::class)
        ->except(['update', 'edit', 'show']);
    Route::resource('users', \App\Http\Controllers\Panel\UserController::class)->except('show');
    Route::put('/good-post/{post}', [\App\Http\Controllers\PostController::class, 'good'])->name('posts.good');
    Route::put('/reject-post/{post}', [\App\Http\Controllers\PostController::class, 'reject'])->name('posts.reject');
    Route::put('/confirm-post/{post}', [\App\Http\Controllers\PostController::class, 'confirm'])->name('posts.confirm');

});
