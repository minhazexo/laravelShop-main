<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

// Route to generate placeholder images (30x30 & 80x80)
Route::get('/create-screenshots', [ImageController::class, 'createScreenshots'])
    ->name('create.screenshots');

// Admin routes
Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'index')->name('admin.root');
});

// Include additional admin routes from admin.php
if (file_exists(__DIR__ . '/admin.php')) {
    require __DIR__ . '/admin.php';
}
