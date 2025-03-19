<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ContactController;

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
 * 🔹 Blog Routes (News)
 */





Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [PostsController::class, 'create'])->name('blog.create');
Route::post('/blog', [PostsController::class, 'store'])->name('blog.store');
Route::get('/blog/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('/blog/{post}/edit', [PostsController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{post}', [PostsController::class, 'update'])->name('blog.update');
Route::delete('/blog/{post}', [PostsController::class, 'destroy'])->name('blog.destroy');

/**
 * 🔹 Comments Routes
 */
Route::middleware(['auth'])->post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');

/**
 * 🔹 Categories Routes
 */


/**
 * 🔹 Teams Routes
 */
// Public Routes
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');

// Admin-Only Routes
Route::middleware('auth')->group(function () {
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

// News by Category
