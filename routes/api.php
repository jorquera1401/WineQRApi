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
Route::resource('vina', 'VinaController',
    ['only'=>['index','store','show','getImage']]);

Route::resource('vina','VinaController',
    ['except'=>['create','edit','update','destroy']]);


Route::resource('predio', 'PredioController',
    ['only'=>['store','show']]);
Route::resource('predio','PredioController',
    ['except'=>['index','create','edit','update','destroy']]);

Route::resource('cosecha', 'CosechaController',
    ['only'=>['index','store','show']]);

Route::resource('cosecha','CosechaController',
    ['except'=>['create','edit','update','destroy']]);

Route::resource('carga', 'CargaController',
    ['only'=>['index','store','show']]);

Route::resource('carga','CargaController',
    ['except'=>['create','edit','update','destroy']]);

Route::resource('descarga', 'DescargaController',
    ['only'=>['cargar','store']]);


Route::resource('descarga', 'DescargaController',
    ['except'=>['index','create','show','edit','update','destroy']]);


Route::resource('almacen', 'AlmacenController',
    ['only'=>['store','cargar']]);
Route::resource('almacen','AlmacenController',
    ['except'=>['index','create','show','edit','update','destroy']]);



Route::resource('bodega', 'BodegaController',
    ['only'=>['index','show','store','cargar']]);


Route::resource('bodega', 'BodegaController',
    ['except'=>['create','update','destroy','edit']]);

Route::get('bodega', 'BodegaController@cargar')->name('bodega.cargar');

Route::get('almacen','AlmacenController@cargar')->name('almacen.cargar');

Route::get('descarga','DescargaController@cargar')->name('descarga.cargar');

Route::get('vinaimage','VinaController@getImage')->name('vina.image');
Route::get('predioimage','PredioController@getImage')->name('predio.image');
Route::get('cosechaimage','CosechaController@getImage')->name('cosecha.image');
Route::get('cargaimage','CargaController@getImage')->name('carga.image');
Route::get('descargaimage','DescargaController@getImage')->name('descarga.image');
Route::get('almacenimage','AlmacenController@getImage')->name('almacen.image');
Route::get('bodegaimage','BodegaController@getImage')->name('bodega.image');

