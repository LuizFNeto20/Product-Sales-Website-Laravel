<?php

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

Route::get('/', function () {
    return view('Components/index');
});

Route::get('/usuario/listar', [UsuarioController::class, 'listar']);
Route::get('/usuario/novo', [UsuarioController::class, 'novo']);
Route::post('/usuario/salvar', [UsuarioController::class, 'salvar']);
Route::get('/usuario/editar', [UsuarioController::class, 'editar']);