<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropretiesController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\gerant;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class,'index']);
Route::get('/', function () {
    return view('welcome', ['name' => 'James']);
});

Route::get('/tags',[TagController::class, 'find'])->name('tag.find');
Route::get('/propreties', [PropretiesController::class, 'find'])->name('propreties.find');
Route::resource('room', RoomController::class);