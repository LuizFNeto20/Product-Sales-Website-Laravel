<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'listar']);

Route::get('/usuario/listar', [UsuarioController::class, 'listar']);
Route::get('/usuario/novo', [UsuarioController::class, 'novo']);
Route::post('/usuario/salvar', [UsuarioController::class, 'salvar']);
Route::get('/usuario/editar', [UsuarioController::class, 'editar']);

Route::get('/produto/listar', [ProdutoController::class, 'listar']);
Route::get('/produto/novo', [ProdutoController::class, 'novo']);
Route::post('/produto/salvar', [ProdutoController::class, 'salvar']);
Route::get('/produto/editar/{id}', [ProdutoController::class, 'editar']);
Route::get('/produto/excluir/{id}', [ProdutoController::class, 'excluir']);