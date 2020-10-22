<?php


use Illuminate\Support\Facades\Route;



Route::get('/', "HomeController@index")->name('home')->middleware('auth');

Route::get('/loginForm', "UsuarioController@loginForm")->name('loginForm');
Route::get('/logout', "UsuarioController@logout")->name("logout");

Route::group(['prefix' => '/funcionarios', 'middleware' => 'auth'], function () {
    Route::get('/list', 'FuncionarioController@index');
    Route::get('/new', 'FuncionarioController@create');
    Route::get('/edit/{id}', "FuncionarioController@edit");
    Route::post('/store', "FuncionarioController@store");
    Route::get('/show/{id}', "FuncionarioController@show");
    Route::get('/formFalta/{id}', "FuncionarioController@formFalta");
    Route::put('/marcFalta/{id}', "FuncionarioController@marcFalta");
    Route::put('/update/{id_funcionario}/{id_pessoa}', "FuncionarioController@update");
    Route::get('/docs/{id}', "FuncionarioController@formDocumentos");
    Route::put('/store_docs/{id}', "FuncionarioController@store_docs");
    Route::get('/download/{ficheiro}', "FuncionarioController@download");
    Route::get('/ibans', "FuncionarioController@ibans");
});

/*Route::group(['prefix'=>'/relatorios', 'middleware'=>'auth'], function(){
    Route::get('/folha_salario', "RelatorioController@create_folha");
    Route::post('/export_folha', "RelatorioController@export_folha");
});*/

Route::group(['prefix' => '/usuarios', 'middleware' => 'auth'], function () {
    Route::get('/perfil', "UsuarioController@perfil");
    Route::get('/list', "UsuarioController@index");
    Route::get('/new/{id_pessoa}', "UsuarioController@create");
    Route::post('/update_perfil', "UsuarioController@update_perfil");
    Route::put('/store/{id_pessoa}', "UsuarioController@store");
});

Route::group(['prefix' => '/ferias', 'middleware' => 'auth'], function () {
    Route::get('/list/{id}', 'FeriaController@index');
    Route::put('/store/{id}', 'FeriaController@store');
});

Route::group(['prefix' => '/reports', 'middleware' => 'auth'], function () {
    Route::get('/declaracao/{id}', 'ReportController@declaracao');
    Route::get('/carta_recomend/{id}', 'ReportController@carta_recomend');
    Route::get('/guia_feria/{id}', 'ReportController@guia_feria');
    Route::get('/folha_salario/{id_salario}', 'ReportController@folha_salario');
    Route::get('/guia_medica/{id_guia}', "ReportController@guia_medica");
});

Route::group(['prefix' => '/salarios', 'middleware' => 'auth'], function () {
    Route::get('/list', 'SalarioController@index');
    Route::get('/new', 'SalarioController@create');
    Route::post('/store', 'SalarioController@store');
    Route::get('/lacamento/{id_salario}', 'SalarioController@lancamento');
    Route::post('/updateFolhaSalarial', 'SalarioController@updateFolhaSalarial')->name("updateFolhaSalarial");
});

Route::group(['prefix' => '/declaracao', 'middleware' => "auth"], function () {
    Route::get('/list/{id}', "DeclaracaoController@index");
    Route::put('/store/{id}', "DeclaracaoController@store");
});

Route::group(['prefix' => '/guia_medica', 'middleware' => "auth"], function () {
    Route::get('/list/{id}', 'GuiaMedicaController@index');
    Route::put('/store/{id}', 'GuiaMedicaController@store');
});

Route::group(['prefix' => '/departamentos', 'middleware' => "auth"], function () {
    Route::get('/list', "DepartamentoController@index");
    Route::get('/new', "DepartamentoController@create");
    Route::post('/store', "DepartamentoController@store");
    Route::get('/add_cargo/{id}', "DepartamentoController@show");
    Route::put('/store_depCargo/{id}', "DepartamentoController@store_depCargo");
});

Route::group(['prefix' => '/clientes', 'middleware' => "auth"], function () {
    Route::get('/list', "ClienteController@index");
    Route::get('/new', "ClienteController@create");
    Route::post('/store', "ClienteController@store");
    Route::get('/faturacao/{id}', "ClienteController@faturacao");
    Route::put('/store_faturacao/{id}', "ClienteController@store_faturacao");
});

Route::group(['prefix' => '/candidaturas', 'middleware' => "auth"], function () {
    Route::get('/list', "CandidaturaController@index");
    Route::get('/new', "CandidaturaController@create");
    Route::post('/store', "CandidaturaController@store");
    Route::get('/add_doc/{id_candidatura}', "CandidaturaController@show");
});

Route::group(['prefix' => '/empresa', 'middleware' => "auth"], function () {
    Route::get('/list', "ConfiguracoesController@empresa_list");
    Route::get('/new', "ConfiguracoesController@empresa_new");
    Route::post('/store', "ConfiguracoesController@empresa_store");
});

Route::group(['prefix' => '/contas', 'middleware' => "auth"], function () {
    Route::get('/list', "ConfiguracoesController@conta_list");
    Route::get('/new', "ConfiguracoesController@conta_new");
    Route::post('/store', "ConfiguracoesController@conta_store");
});

Route::group(['prefix' => '/bancos', 'middleware' => "auth"], function () {
    Route::get('/list', "ExtraController@banco_list");
    Route::get('/new', "ExtraController@banco_new");
    Route::post('/store', "ExtraController@banco_store");
});

Route::group(['prefix' => '/balancos', 'middleware' => "auth"], function () {
    Route::get('/salarios', "BalancoController@salario");
});

Route::post('/login', "UsuarioController@login");
Route::post('/getMunicipio', "FuncionarioController@getMunicipio")->name('getMunicipio');

Route::post('/setPrioridade', 'SalarioController@setPrioridade')->name('setPrioridade');

Route::post('/remPrioridade', 'SalarioController@remPrioridade')->name('remPrioridade');

Route::get('/excel', "ExcelDoc@index");

Route::get('/funcionario/export', "FuncionarioController@export");