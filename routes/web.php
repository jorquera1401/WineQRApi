<?php

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
   
    //return View::make('welcome')  View:make('intro');
    return view('welcome');
});

Route::get('/intro', function(){
    return view('intro');
})->name('intro');

Route::get('/vina', 'VinaController@index')->name('vina');

Route::get('/cosecha', 'CosechaController@index')->name('cosecha');
Route::get('/carga','CargaController@index')->name('carga');

Route::post('/prueba', 'VinaController@generar')->name('prueba');

Route::post('/generarCosecha', 'CosechaController@generar')->name('cosecha_generate');

Route::post('/generarCarga','CargaController@generar')->name('carga_generate');

Route::get('/tablas','BodegaController@index')->name('tablas');



//livewire
 