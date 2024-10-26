<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProdutosController::class, 'index']);
Route::get('/produtos/create', [ProdutosController::class, 'create']);
Route::get('/produtos/edit', [ProdutosController::class, 'edit']);
Route::get('/produtos/store', [ProdutosController::class, 'store']);
Route::get('/produtos/show', [ProdutosController::class, 'show']);
Route::get('/produtos/destroy', [ProdutosController::class, 'destroy']);

Route::resource('produtos', ProdutosController::class);