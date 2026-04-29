<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/formulario', [FormularioController::class, 'store'])->name('store');
Route::resource('formularios', FormularioController::class);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');
    Route::get('/exportar-formularios', [DashboardController::class, 'export'])->name('exportar.formularios');
Route::post('/importar-formularios', [DashboardController::class, 'import'])->name('importar.formularios');
Route::get('/formularios/{id}/edit', [FormularioController::class, 'edit'])->name('formularios.edit');