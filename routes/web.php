<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Main Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamFollowController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\FixturesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\VoteController;

/*
|--------------------------------------------------------------------------
| 🔐 Authentication Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

/*
|--------------------------------------------------------------------------
| 🏠 Home & Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    })->name('dashboard');

    // Profile Picture Upload
    Route::put('/dashboard/profile-picture', [HomeController::class, 'updateProfilePicture'])->name('user.profile-picture.update');
});

/*
|--------------------------------------------------------------------------
| 📰 Blog / News Routes
|--------------------------------------------------------------------------
*/
Route::get('/blog', [PostsController::class, 'allNews'])->name('blog.index');
Route::get('/blog/create', [PostsController::class, 'create'])->name('blog.create');
Route::post('/blog', [PostsController::class, 'store'])->name('blog.store');
Route::get('/blog/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('/blog/{post}/edit', [PostsController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{post}', [PostsController::class, 'update'])->name('blog.update');
Route::delete('/blog/{post}', [PostsController::class, 'destroy'])->name('blog.destroy');

/*
|--------------------------------------------------------------------------
| 💬 Comments
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');

/*
|--------------------------------------------------------------------------
| 🏟️ Teams
|--------------------------------------------------------------------------
*/
// Public
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');

// Authenticated
Route::middleware('auth')->group(function () {
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

    // Team Follow
    Route::post('/teams/{team}/follow', [TeamFollowController::class, 'follow'])->name('teams.follow');
    Route::delete('/teams/{team}/unfollow', [TeamFollowController::class, 'unfollow'])->name('teams.unfollow');
});

/*
|--------------------------------------------------------------------------
| 📅 Fixtures & Matches
|--------------------------------------------------------------------------
*/
Route::get('/fixtures', [FixturesController::class, 'index'])->name('fixtures.index');
Route::get('/fixtures/{id}', [FixturesController::class, 'show'])->name('fixtures.show');
Route::get('/matches', [FixturesController::class, 'index'])->name('matches.index');
Route::get('/matches/{id}', [FixturesController::class, 'show'])->name('matches.show');

// Player of the Match Voting & Predictions
Route::middleware('auth')->group(function () {
    Route::post('/fixtures/{fixture}/predict', [PredictionController::class, 'store'])->name('fixtures.predict');
    Route::post('/fixtures/{fixture}/vote', [FixturesController::class, 'vote'])->name('player.vote');
    Route::post('/match/{match}/vote', [VoteController::class, 'store'])->name('vote.player');
});

Route::get('/fixtures/{fixture}/poll-results', [PredictionController::class, 'showPollResults'])->name('fixtures.poll-results');

/*
|--------------------------------------------------------------------------
| 📩 Contact Page
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
