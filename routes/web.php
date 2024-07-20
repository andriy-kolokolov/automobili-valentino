<?php

use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\CarsSellingController;
use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;

// все маршруты здесь доступны всем
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/cars-selling', [CarsSellingController::class, 'index'])->name('cars-selling');

Route::get('/assistance', [AssistanceController::class, 'index'])->name('assistance');;

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // все маршруты здесь доступны залогиненным пользователям
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
