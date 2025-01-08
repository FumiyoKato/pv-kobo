<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //【初回予測設定】用のコントローラ
use App\Http\Controllers\ForecastUnitController; //【予測単位追加】用のコントローラ

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//予測単位1件目の[Postルート]
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/create', [PostController::class, 'store'])->name('post.store');

//予測単位追加(2件目以降)の[ForecastUnitルート]
Route::get('forecast-units', [ForecastUnitController::class, 'index'])->name('forecast-units.index');
Route::post('forecast-units', [ForecastUnitController::class, 'store'])->name('forecast-units.store');

require __DIR__.'/auth.php';
