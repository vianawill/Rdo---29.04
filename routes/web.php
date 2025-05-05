<?php

use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaoObraDiretaController;
use App\Http\Controllers\MaoObraIndiretaController;
use App\Http\Controllers\ObraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home'); // Exibe o formulário
});

Auth::routes(); //protege todas as rotas

Route::middleware(['auth'])->group(function() {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('rdos', RdoController::class);
    Route::post('/rdos/{rdo}/aprovar', [RdoController::class, 'aprovar'])->name('rdos.aprovar');
    Route::get('/rdos/{rdo}/pdf', [RdoController::class, 'gerarPDF'])->name('rdos.pdf');
    Route::post('/rdo/{rdo}/assinarPdf', [RdoController::class, 'assinarPdf'])->name('rdos.assinarPdf');
    Route::resource('turnos', TurnoController::class);
    Route::resource('obras', ObraController::class);
    Route::resource('equipamentos', EquipamentoController::class);
    Route::resource('mao_obra_diretas', MaoObraDiretaController::class);
    Route::resource('mao_obra_indiretas', MaoObraIndiretaController::class);
    
});