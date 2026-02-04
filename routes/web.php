<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
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
