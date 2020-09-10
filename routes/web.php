<?php

use Illuminate\Support\Facades\Route;



Route::get('/', "HomeController@index")->name('home')->middleware('auth');

Route::get('/loginForm', "UsuarioController@loginForm")->name('loginForm');
Route::get('/logout', "UsuarioController@logout")->name("logout");

Route::group(['prefix'=>'/funcionarios', 'middleware'=>'auth'], function(){
    Route::get('/list', 'FuncionarioController@index');
    Route::get('/new', 'FuncionarioController@create');
    Route::get('/edit/{id}', "FuncionarioController@edit");
    Route::post('/store', "FuncionarioController@store");
    Route::get('/show/{id}', "FuncionarioController@show");
    Route::get('/formFalta/{id}', "FuncionarioController@formFalta");
    Route::put('/marcFalta/{id}', "FuncionarioController@marcFalta");
    Route::put('/update/{id_funcionario}/{id_pessoa}', "FuncionarioController@update");
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

Route::get('/excel', "ExcelDoc@index");

Route::get('/funcionario/export', "FuncionarioController@export");