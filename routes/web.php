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

Route::get('/', "HomeController@index")->name('home')->middleware('auth');

Route::get('/loginForm', "UsuarioController@loginForm")->name('loginForm');
Route::get('/logout', "UsuarioController@logout")->name("logout");

Route::group(['prefix'=>'/funcionarios', 'middleware'=>'auth'], function(){
    Route::get('/list', 'FuncionarioController@index');
    Route::get('/new', 'FuncionarioController@create');
    Route::post('/store', "FuncionarioController@store");
    Route::get('/show/{id}', "FuncionarioController@show");
    Route::get('/formFalta/{id}', "FuncionarioController@formFalta");
    Route::put('/marcFalta/{id}', "FuncionarioController@marcFalta");
});

Route::group(['prefix'=>'/relatorios', 'middleware'=>'auth'], function(){
    Route::get('/folha_salario', "RelatorioController@create_folha");
    Route::post('/export_folha', "RelatorioController@export_folha");
});

Route::post('/login', "UsuarioController@login");
Route::post('/getMunicipio', "FuncionarioController@getMunicipio")->name('getMunicipio');
//Route::get('/home', 'HomeController@index')->name('home');
Route::post('/setPrioridade', 'RelatorioController@setPrioridade')->name('setPrioridade');

Route::post('/remPrioridade', 'RelatorioController@remPrioridade')->name('remPrioridade');

