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
    return view('index',["current" => "home"]);
});

Route::group(['prefix' => 'produtos'], function () {
    Route::get('/', ['as' => 'adminProdutos', 'uses' => 'ProdutoController@index']);
    Route::get('/create', ['as' => 'adminProdutosCreate', 'uses' => 'ProdutoController@create']);
    Route::post('/store', ['as' => 'adminProdutosStore', 'uses' => 'ProdutoController@store']);
    Route::post('/update', ['as' => 'adminProdutosUpdate', 'uses' => 'ProdutoController@update']);
});

Route::group(['prefix' => 'categorias'], function () {
    Route::get('/', ['as' => 'adminCategorias', 'uses' => 'CategoriaController@index']);
    Route::get('/create', ['as' => 'adminCategoriasCreate', 'uses' => 'CategoriaController@create']);
    Route::post('/store', ['as' => 'adminCategoriasStore', 'uses' => 'CategoriaController@store']);
    Route::get('/destroy/{id}', ['as' => 'adminCategoriasDestroy', 'uses' => 'CategoriaController@destroy']);
    Route::get('/edit/{id}', ['as' => 'adminCategoriasEdit', 'uses' => 'CategoriaController@edit']);
    Route::get('/update/{id}', ['as' => 'adminCategoriasUpdate', 'uses' => 'CategoriaController@update']);  
});

Route::group(['prefix' => 'usuario'], function () {
    Route::get('/index', ['as' => 'adminUsuario', 'uses' => 'UsuarioController@index']);
    Route::get('/create', ['as' => 'adminCreate', 'uses' => 'UsuarioController@create']);
    Route::post('/store', ['as' => 'adminStore', 'uses' => 'UsuarioController@store']); 
});