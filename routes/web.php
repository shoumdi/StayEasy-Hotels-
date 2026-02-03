<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function(){
    $user =auth()->user();

})->name('home');
// Route::get('/login', [AuthController::class,'index']);
Route::get('/login', [AuthController::class,'showLoginView'])->name('auth.login.view');
Route::post('/login', [AuthController::class,'login'])->name('auth.login');
Route::get('/register', [AuthController::class,'showRegisterView'])->name('auth.register.view');
Route::post('/register', [AuthController::class,'register'])->name('auth.register');
