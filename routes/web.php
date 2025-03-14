<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{WelcomeController,ContactController};

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::post('/contact', [ContactController::class, 'send']);

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
