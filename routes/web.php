<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// ログイン後、ダッシュボードへ遷移
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/update-delivery-email', [ProfileController::class, 'updateDeliveryEmail'])->name('profile.update.delivery_email');
});

Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/create', [PostController::class, 'store'])->name('post.store');

require __DIR__.'/auth.php';