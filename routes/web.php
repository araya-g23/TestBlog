<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
use App\Http\Controllers\PostController;

Route::get('/news', [PostController::class, 'index'])->name('posts.index');
Route::get('/news/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/news/create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');
Route::post('/news', [PostController::class, 'store'])->middleware('auth')->name('posts.store');
Route::get('/news/{id}/edit', [PostController::class, 'edit'])->middleware('auth')->name('posts.edit');
Route::put('/news/{id}', [PostController::class, 'update'])->middleware('auth')->name('posts.update');
Route::delete('/news/{id}', [PostController::class, 'destroy'])->middleware('auth')->name('posts.destroy');
use App\Http\Controllers\TeamController;

Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');

use App\Http\Controllers\MatchController;

Route::get('/fixtures', [MatchController::class, 'index'])->name('matches.index');
