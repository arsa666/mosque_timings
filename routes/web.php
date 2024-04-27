<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MosquesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\EnsurePass;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/mosques', [MosquesController::class, 'edit'])->name('mosques.edit');
    Route::post('/mosques', [MosquesController::class, 'create'])->name('mosque.create');
    Route::patch('/mosques', [MosquesController::class, 'update'])->name('mosque.update');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/mosque/{id}', [MosquesController::class, 'show'])->name('mosque.show');

// Route::get('/test2/{param_one?}', function ($param_one = "jogn") {
//     return "test2: $param_one";
// });






require __DIR__.'/auth.php';
