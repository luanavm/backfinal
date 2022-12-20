<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MsclientesController;

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
Route::get('/obtenerClientes',[MsclientesController::class, 'index']);
Route::get('/obtenerCliente/{id}',[MsclientesController::class, 'show']);
Route::post('/insertarCliente',[MsclientesController::class, 'crear']);
Route::delete('/msclientes/{id}',[MsclientesController::class, 'eliminar']);
Route::put('/msclientes/{id}',[MsclientesController::class, 'editar']);