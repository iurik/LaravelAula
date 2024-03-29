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

//rota para a tela primária do Laravel
Route::get('/', function () {
    return view('welcome');
});

//aqui ele cadastra automaticamente todas rotas de autenticação
Auth::routes();

//quando o usuário está logado, ele direciona para a /home
Route::get('/home', 'HomeController@index')->name('home');

//duas rotas que serão liberadas para usuários não logados
Route::get('/atividades', 'AtividadeController@index');
Route::get('/mensagens', 'MensagemController@index');

//rotas que serão liberadas somente para usuários logados
Route::group(['middleware' => 'auth'], function(){
    //atividades
	Route::get('/atividades/create', 'AtividadeController@create');
	Route::post('/atividades', 'AtividadeController@store');
	Route::get('/atividades/{id}', 'AtividadeController@show');
	Route::get('/atividades/{id}/edit', 'AtividadeController@edit');
	Route::put('/atividades/{id}', 'AtividadeController@update');
	Route::get('/atividades/{id}/delete', 'AtividadeController@delete');
	Route::delete('/atividades/{id}', 'AtividadeController@destroy');
    
    //mensagens
	Route::get('/mensagens/create','MensagemController@create');
	Route::post('/mensagens','MensagemController@store');
	Route::get('/mensagens/{id}', 'MensagemController@show');
    Route::get('/mensagens/{id}/edit', 'MensagemController@edit');
	Route::put('/mensagens/{id}', 'MensagemController@update');
	Route::get('/mensagens/{id}/delete', 'MensagemController@delete');
	Route::delete('/mensagens/{id}', 'MensagemController@destroy');
    	
});

