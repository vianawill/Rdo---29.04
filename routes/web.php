<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdoController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login'); // Exibe o formulário
});

Route::post('/rdo/gerar', [RdoController::class, 'gerarRdo']); // Processa o formulário

Route::get('/rdo', [RdoController::class, 'rdo'])->name('rdo');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
