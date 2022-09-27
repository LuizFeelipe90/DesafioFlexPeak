<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PedidoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

// Route::get('/clientes',[ClienteController::class,'index']);//rota principal
// Route::post('/clientes',[ClienteController::class,'store']);//enviar pra db
// Route::get('/clientes/{id}',[ClienteController::class,'show']);//trazer as informações de um unico objeto
// Route::delete('/clientes/{id}',[ClienteController::class,'destroy']);//deleta a id cliente
// Route::post('/clientes/{id}',[ClienteController::class,'update']);//atualizar info cliente

// Route::get('/itens',[ItemController::class,'index']);//rota principal
// Route::post('/itens',[ItemController::class,'store']);//enviar pra db
// Route::get('/itens/{id}',[ItemController::class,'show']);//trazer as informações de um unico objeto
// Route::delete('/itens/{id}',[ItemController::class,'destroy']);//deleta a id cliente
// Route::post('/itens/{id}',[ItemController::class,'update']);//atualizar info cliente

Route::get('/pedidos',[PedidoController::class,'index']);//rota principal
Route::post('/pedidos',[PedidoController::class,'store']);//enviar pra db
Route::get('/pedidos/{id}',[PedidoController::class,'show']);//trazer as informações de um unico objeto
//Route::delete('/pedidos/{id}',[PedidoController::class,'destroy']);//deleta a id cliente
Route::post('/pedidos/{id}',[PedidoController::class,'update']);//atualizar info cliente

Route::get('pedidos', [PedidoController::class, 'index']);
Route::post('pedidos/register', [PedidoController::class, 'register']);
Route::post('pedidos/edit/{id}', [PedidoController::class, 'edit']);