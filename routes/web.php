<?php
use App\Http\Controllers\PropretiesController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\gerant;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Symfony\Component\HttpFoundation\Request;


Route::get('/', [AuthController::class, 'me'])->name('auth.me');
Route::middleware(['auth'])->get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::middleware(['guest'])
    ->name('auth.')
    ->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginView'])->name('login.view');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/register', [AuthController::class, 'showRegisterView'])->name('register.view');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
    });
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/admin/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::post('/roles/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/update', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/delete', [RoleController::class, 'delete'])->name('roles.delete');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'edit'])->name('users.edit');
        Route::delete('/users', [UserController::class, 'delete'])->name('users.delete');
        Route::patch('/users', [UserController::class, 'updateStatus'])->name('users.update.status');
    });

Route::middleware(['auth'])
    ->prefix('profile')
    ->name('profile.')
    ->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/', [ProfileController::class, 'update'])->name('update');
    });

Route::middleware(['auth'])
    ->prefix('history')
    ->name('history')
    ->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');

    });

Route::get('/availability', function () {
    return view('search-availability');
})->name('availablility.search');

Route::get('/availablility', function (Request $request) {
    dd($request);
});
Route::get('/login', [AuthController::class,'index']);
Route::get('/', function () {
    return view('welcome', ['name' => 'James']);
});

Route::get('/tags',[TagController::class, 'find'])->name('tag.find');
Route::get('/propreties', [PropretiesController::class, 'find'])->name('propreties.find');
Route::resource('room', RoomController::class);
