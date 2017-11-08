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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bancas','BancaController@index')->middleware('auth');

Route::get('/bancas/cadastrar','BancaController@create')->middleware('auth');

Route::post('/bancas/gravar','BancaController@store')->middleware('auth');


Route::get('/bancas/ver/{id}','BancaController@show')->middleware('auth');

Route::post('/bancas/atualizar/{id}','BancaController@update')->middleware('auth');


Route::get('/bancas/apagar/{id}','BancaController@destroy')->middleware('auth');

Route::get('/categorias','CategoriasController@index')->middleware('auth');

Route::get('/categorias/cadastrar','CategoriasController@create')->middleware('auth');

Route::post('/categorias/gravar','CategoriasController@store')->middleware('auth');

Route::get('/categorias/ver/{id}','CategoriasController@show')->middleware('auth');

Route::post('/categorias/atualizar/{id}','CategoriasController@update')->middleware('auth');

Route::get('/categorias/apagar/{id}','CategoriasController@destroy')->middleware('auth');

Route::get('/naturezas','NaturezasController@index')->middleware('auth');

Route::get('/naturezas/cadastrar','NaturezasController@create')->middleware('auth');

Route::post('/naturezas/gravar','NaturezasController@store')->middleware('auth');

Route::get('/naturezas/ver/{id}','NaturezasController@show')->middleware('auth');

Route::post('/naturezas/atualizar/{id}','NaturezasController@update')->middleware('auth');

Route::get('/naturezas/apagar/{id}','NaturezasController@destroy')->middleware('auth');

Route::get('/pessoas','PessoasController@index')->middleware('auth');