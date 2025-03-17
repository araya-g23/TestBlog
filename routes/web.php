<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

/**
 * 🔹 Authentication Routes (Login, Register, Logout)
 */
Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

/**
 * 🔹 Home & Dashboard
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    })->name('dashboard');
});

/**
 * 🔹 News / Posts Routes
 */
Route::get('/news', [PostController::class, 'index'])->name('posts.index');
Route::get('/news/{post}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/news/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/news', [PostController::class, 'store'])->name('posts.store');
    Route::get('/news/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/news/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/news/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

/**
 * 🔹 Comments Routes
 */
Route::middleware(['auth'])->post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');

/**
 * 🔹 Categories Routes
 */
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});

/**
 * 🔹 Teams Routes
 */
// Public Routes
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');

// Admin-Only Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
});
/**
 * 🔹 Fixtures Routes
 */
Route::get('/fixtures', [MatchController::class, 'index'])->name('matches.index');

/**
 * 🔹 Contact Routes
 */
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

