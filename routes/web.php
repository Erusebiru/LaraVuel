<?php

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

/*Route::get('/', function () {
    return view('app');
});*/

Route::get('api/proyectos','ProyectosController@getProyectos');

Route::get('/{any}','ProyectosController@index')->where('any','.*');

//Route::post('proyectos/show/{id}','ProyectosController@showProyect');

Route::get('api/proyecto','ProyectosController@getSingleProyect');