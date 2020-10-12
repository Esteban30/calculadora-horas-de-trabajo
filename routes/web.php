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

// Route::get('/', function () {
//      ('welcome');
// });
Route::redirect('/', '/servicios');

//Route::get('/', 'ServiciosController@index');

Route::get('/servicios', 'ServiciosController@index');
Route::post('/crearServicios','ServiciosController@store');
Route::get('/servicios/ver','ServiciosController@edit');
Route::post('/servicios','ServiciosController@update');
Route::delete('/servicios/{id}','ServiciosController@destroy');


Route::get("/clientes", "ClientesController@index");
Route::post("/crearclientes", "ClientesController@store");
Route::get('/clientes/ver', 'ClientesController@edit');
Route::post('/clientes', 'ClientesController@update');
Route::delete('/clientes/{id}','ClientesController@destroy');

Route::get('/tecnicos','TecnicosController@index');
Route::post('/creartecnicos','TecnicosController@store');
Route::get('/tecnicos/ver','TecnicosController@edit');
Route::post('/tecnicos','TecnicosController@update');
Route::delete('/tecnicos/{id}','TecnicosController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
