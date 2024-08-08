<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/test-authorization', function () {
    $user = auth()->user();
    $profile = $user->profile;
    return Gate::allows('view', $profile) ? 'Authorized' : 'Not Authorized';
});

Route::get('/email',function (){
    return new \App\Mail\NewUserWelcomeMail();
});

Route::post('/follow/{user}',[\App\Http\Controllers\FollowsController::class,'store']);

Route::get('/dashboard', [ProfilesController::class, 'dashboard'])->name('dashboard');

Route::get('/', [\App\Http\Controllers\PostsController::class,'index'])->name('main');


Route::get('/p/create/{profile}', [\App\Http\Controllers\PostsController::class, 'create']);

Route::get('/p/{post}',[\App\Http\Controllers\PostsController::class,'show']);


Route::middleware('auth')->group(function () {

Route::post('/p',[\App\Http\Controllers\PostsController::class,'store']);
});
Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'update'])->name('profile.update');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
