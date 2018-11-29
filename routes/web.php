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


/*
    Usuario NÃO autenticado redirecionado para login

    Usuario AUTENTICADO redirecionado para home
*/
Route::get('/', function () {
    if(Auth::check()){
        if(Auth::user()->type == 'a') {
            return redirect('/solicitacao-software');
        }
        return redirect()->action('HomeController@index');
    }else{
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::put('/solicitacao-software/alterar-status/{id}', 'SolicitacaoSoftwareController@updateStatus');

Route::get('/usuarios/{id}/{tipo}', 'UsuarioController@alterarTipo');

// Rotas CRUDs
Route::resource('localizacao', 'LocalizacaoController');
Route::resource('sala', 'SalasController');
Route::resource('laboratorio', 'LaboratorioController');
Route::resource('usuarios', 'UsuarioController');
Route::resource('software', 'SoftwareController');
Route::resource('solicitacao-software', 'SolicitacaoSoftwareController');
Route::resource('locacao', 'LocacaoController');

//Rotas remocao
Route::delete('/localizacao/{localizacao}', 'LocalizacaoController@destroy');
Route::delete('/sala/{sala}', 'SalasController@destroy');
Route::delete('/laboratorio/{laboratorio}', 'LaboratorioController@destroy');
Route::delete('/software/{software}', 'SoftwareController@destroy');
Route::delete('/solicitacao-software/{solicitacao}', 'SolicitacaoSoftwareController@destroy');
Route::delete('/locacao/{locacao}', 'LocacaoController@destroy');