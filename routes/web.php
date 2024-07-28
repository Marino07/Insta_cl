<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProfilesController::class, 'dashboard'])->name('dashboard');

Route::get('/p/create',[\App\Http\Controllers\PostsController::class,'create']);

Route::get('/p/{post}',[\App\Http\Controllers\PostsController::class,'show']);


Route::middleware('auth')->group(function () {

Route::post('/p',[\App\Http\Controllers\PostsController::class,'store']);
});



Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
