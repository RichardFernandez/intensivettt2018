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

// rutas de administracion

Route::resource('/categorias', 'CategoriasController');

Route::resource('/disciplinas', 'DisciplinasController');

Route::resource('/estados', 'EstadosController');

Route::get('/medidas', 'MedidasController@index');




