<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\VendasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth.jwt', 'prefix' => 'v1'], static function () {

    Route::get('/funcionarios',  [FuncionarioController::class, 'index']);
    Route::post('/funcionarios',  [FuncionarioController::class, 'store']);
    Route::delete('/funcionarios/{id}',  [FuncionarioController::class, 'destroy']);
    Route::get('/funcionarios/{id}',  [FuncionarioController::class, 'show']);
    Route::put('/funcionarios/{id}',  [FuncionarioController::class, 'update']);

    Route::get('/vendas',  [VendasController::class, 'index']);
    Route::post('/vendas',  [VendasController::class, 'store']);
    Route::delete('/vendas/{id}',  [VendasController::class, 'destroy']);
    Route::get('/vendas/{id}',  [VendasController::class, 'show']);
    Route::put('/vendas/{id}',  [VendasController::class, 'update']);
});

Route::post('login', [App\Http\Controllers\APIController::class, 'login']);
Route::post('logout', [App\Http\Controllers\APIController::class, 'logout']);
