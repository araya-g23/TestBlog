<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;

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
use Illuminate\Support\Facades\Auth;

Auth::routes(); // This adds login, register, logout routes automatically
use App\Http\Controllers\CommentController;

Route::post('/comments/{post_id}', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});

