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
Route::get('/produtos', ['as' => 'adminProdutos', 'uses' => 'ProdutoController@index']);
Route::get('/produtos/create', ['as' => 'adminProdutosCreate', 'uses' => 'ProdutoController@create']);
Route::post('/produtos/store', ['as' => 'adminProdutosStore', 'uses' => 'ProdutoController@store']);

Route::get('/categorias', ['as' => 'adminCategorias', 'uses' => 'CategoriaController@index']);
Route::get('/categorias/create', ['as' => 'adminCategoriasCreate', 'uses' => 'CategoriaController@create']);
Route::post('/categorias/store', ['as' => 'adminCategoriasStore', 'uses' => 'CategoriaController@store']);
Route::get('/categorias/destroy/{id}', ['as' => 'adminCategoriasDestroy', 'uses' => 'CategoriaController@destroy']);
Route::get('/categorias/edit/{id}', ['as' => 'adminCategoriasEdit', 'uses' => 'CategoriaController@edit']);
Route::get('/categorias/update/{id}', ['as' => 'adminCategoriasUpdate', 'uses' => 'CategoriaController@update']); 
