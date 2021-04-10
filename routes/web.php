<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/avisos', function () {
    return view('avisos', [
        'nome' => 'jessi',
        'mostrar' => true,
        'avisos' => [['id' => 1, 'texto' => "Feriados Agora"], ['id' => 2, 'texto' => "Feriados Semana que vem"]]
    ]);
});


Route::get('/funcionario', [FuncionarioController::class, 'index'])->name('funcionario.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'clientes'], function () {
    Route::get('/listar', [ClientesController::class, 'listar'])->middleware('auth');
});

Route::group(['prefix' => 'vendas'], function () {
    Route::get('/listar', [VendasController::class, 'listar'])->middleware('auth');
});

