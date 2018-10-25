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

Route::get('/', function () {
    return view('inicio');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// RUTAS DE BACKEND CATALOGOS

/*Rutas de primer nivel*/

Route::resource('/categorias', 'CategoriasController');
Route::get('categorias/{id}/destroy', 'CategoriasController@destroy');

Route::resource('/disciplinas', 'DisciplinasController');
Route::get('disciplinas/{id}/destroy', 'DisciplinasController@destroy');


Route::resource('/estados', 'EstadosController');
Route::get('estados/{id}/destroy', 'EstadosController@destroy');


Route::resource('/marcas', 'MarcasController');
Route::get('marcas/{id}/destroy', 'MarcasController@destroy');


Route::resource('/medidas', 'MedidasController');
Route::get('medidas/{id}/destroy', 'MedidasController@destroy');


Route::resource('/frases', 'FrasesController');
Route::get('frases/{id}/destroy', 'FrasesController@destroy');

Route::resource('/insumos', 'InsumosController');
Route::get('insumos/{id}/destroy', 'InsumosController@destroy');

Route::resource('/bebidas', 'BebidasController');
Route::get('bebidas/{id}/destroy', 'BebidasController@destroy');


/*Rutas de segundo nivel*/

Route::resource('/suplementos', 'SuplementosController');
Route::get('suplementos/{id}/destroy', 'SuplementosController@destroy');


Route::resource('/insumos', 'InsumosController');

Route::resource('/videos', 'VideosController');
Route::get('videos/{id}/destroy', 'VideosController@destroy');

Route::resource('/recetas', 'RecetasController');
Route::get('recetas/{id}/destroy', 'RecetasController@destroy');




