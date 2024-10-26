<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdoController;

Route::get('/rdo', function () {
    return view('rdo'); // Exibe o formulário
});

Route::post('/rdo/gerar', [RdoController::class, 'gerarRdo']); // Processa o formulário

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
