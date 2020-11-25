<?php

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
//Ruta para ver datos de viña
Route::resource('vina', 'VinaController');

Route::resource('predio', 'PredioController');

Route::resource('cosecha', 'CosechaController');

Route::resource('carga', 'CargaController');

Route::resource('descarga', 'DescargaController');

Route::resource('almacen', 'AlmacenController');

Route::resource('bodega', 'BodegaController');