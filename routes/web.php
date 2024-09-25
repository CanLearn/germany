<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('welcome');
});
Route::name('landing.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Front\LandingController::class, 'index'])
        ->name('index');
    Route::get('categories/{categories:slug}', [\App\Http\Controllers\Front\LandingController::class, 'category'])
        ->name('category.slug');
    Route::get('posts/{posts:slug}',
        [\App\Http\Controllers\Front\LandingController::class, 'singlePost'])
        ->name('single.post');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['role:manager', 'auth'])->name('panel.')->prefix('panel')->group(function () {
    Route::get('/', [\App\Http\Controllers\Panel\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', \App\Http\Controllers\PostController::class)->except('show');
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('tags', \App\Http\Controllers\TagController::class);
    Route::resource('comments', \App\Http\Controllers\CommentController::class);
    Route::resource('users', \App\Http\Controllers\Panel\UserController::class)->except('show');
    Route::put('/good-post/{post}', [\App\Http\Controllers\PostController::class, 'good'])->name('posts.good');
    Route::put('/reject-post/{post}', [\App\Http\Controllers\PostController::class, 'reject'])->name('posts.reject');
    Route::put('/confirm-post/{post}', [\App\Http\Controllers\PostController::class, 'confirm'])->name('posts.confirm');

});

require __DIR__ . '/auth.php';
