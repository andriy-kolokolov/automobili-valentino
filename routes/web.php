<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;

// все маршруты здесь доступны всем
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // все маршруты здесь доступны залогиненным пользователям
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
