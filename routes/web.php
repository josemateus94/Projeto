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

Route::get('/', ['as' => 'adminUsuario', 'uses' => 'UsuarioController@index']);
Route::get('/usuarios/create', ['as' => 'adminCreate', 'uses' => 'UsuarioController@create']);
Route::post('/usuarios/store', ['as' => 'adminStore', 'uses' => 'UsuarioController@store']);