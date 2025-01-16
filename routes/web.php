<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\AuthController;

// Rute untuk autentikasi
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk registrasi
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Rute untuk proyek
Route::resource('projects', ProjectController::class);

// Rute untuk tugas
Route::prefix('projects/{project}')->group(function () {
    Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show'); // Menambahkan rute ini
    Route::post('/tasks/{task}/update-progress', [TaskController::class, 'updateProgress']);

    // Rute untuk komentar
    Route::prefix('tasks/{task}')->group(function () {
        Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
        Route::get('comments/create', [CommentController::class, 'create'])->name('comments.create');
        Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
        Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    });
});

// Rute untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');