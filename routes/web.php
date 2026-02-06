<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class,'me'])->name('auth.me');
// Route::get('/login', [AuthController::class,'index']);
Route::get('/login', [AuthController::class,'showLoginView'])->name('auth.login.view');
Route::post('/login', [AuthController::class,'login'])->name('auth.login');
Route::get('/register', [AuthController::class,'showRegisterView'])->name('auth.register.view');
Route::post('/register', [AuthController::class,'register'])->name('auth.register');

Route::get('/admin/roles',[RoleController::class,'index'])->name('admin.roles.index');
Route::post('/admin/roles/create',[RoleController::class,'create'])->name('admin.roles.create');
Route::post('/admin/roles/store',[RoleController::class,'store'])->name('admin.roles.store');
Route::post('/admin/roles/edit',[RoleController::class,'edit'])->name('admin.roles.edit');
Route::put('/admin/roles/update',[RoleController::class,'update'])->name('admin.roles.update');
Route::delete('/admin/roles/update',[RoleController::class,'delete'])->name('admin.roles.delete');
Route::get('/admin/users',[UserController::class,'index'])->name('admin.users.index');
Route::post('/admin/users',[UserController::class,'edit'])->name('admin.users.edit');
Route::delete('/admin/users',[UserController::class,'delete'])->name('admin.users.delete');
Route::put('/admin/users',[UserController::class,'update'])->name('admin.users.update');


Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('/profile',[ProfileController::class,'update'])->name('profile.update');