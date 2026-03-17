<?php
// File: routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\DashboardController;

// ===== FRONTEND =====
Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('contact');

// ===== AUTH (bawaan Laravel Breeze/UI) =====
require __DIR__.'/auth.php';

// ===== ADMIN =====
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Hero
    Route::get('/hero', [DashboardController::class, 'heroEdit'])->name('hero');
    Route::put('/hero', [DashboardController::class, 'heroUpdate'])->name('hero.update');

    // About
    Route::get('/about', [DashboardController::class, 'aboutEdit'])->name('about');
    Route::put('/about', [DashboardController::class, 'aboutUpdate'])->name('about.update');

    // Skills
    Route::get('/skills', [DashboardController::class, 'skills'])->name('skills');
    Route::post('/skills', [DashboardController::class, 'skillStore'])->name('skills.store');
    Route::put('/skills/{skill}', [DashboardController::class, 'skillUpdate'])->name('skills.update');
    Route::delete('/skills/{skill}', [DashboardController::class, 'skillDestroy'])->name('skills.destroy');

    // Portfolios
    Route::get('/portfolios', [DashboardController::class, 'portfolios'])->name('portfolios');
    Route::get('/portfolios/create', [DashboardController::class, 'portfolioCreate'])->name('portfolios.create');
    Route::post('/portfolios', [DashboardController::class, 'portfolioStore'])->name('portfolios.store');
    Route::get('/portfolios/{portfolio}/edit', [DashboardController::class, 'portfolioEdit'])->name('portfolios.edit');
    Route::put('/portfolios/{portfolio}', [DashboardController::class, 'portfolioUpdate'])->name('portfolios.update');
    Route::delete('/portfolios/{portfolio}', [DashboardController::class, 'portfolioDestroy'])->name('portfolios.destroy');

    // Settings
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::put('/settings', [DashboardController::class, 'settingsUpdate'])->name('settings.update');

    // Messages
    Route::get('/messages', [DashboardController::class, 'messages'])->name('messages');
    Route::get('/messages/{message}', [DashboardController::class, 'messageRead'])->name('messages.read');
    Route::delete('/messages/{message}', [DashboardController::class, 'messageDestroy'])->name('messages.destroy');
});
