<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/formulario', [FormularioController::class, 'store'])->name('store');

