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

/*
Rotas de teste
 */

Route::get('testeFlash', function () {
    return view('admin.dashboard');
})->name('testeFlash');

Route::post('testeAjax', 'PrestadorController@testeAjax')->name('testeAjax');

Route::get('testeGate', function () {
    return view('admin.novoPrestador');
})->middleware('can:fiscal');

// Fim rotas de teste

/*
|--------------------------------------------------------------------------
| Rotas Válidas
|--------------------------------------------------------------------------
|
 */

Auth::routes();

/*
|--------------------------------------------------------------------------
| Rotas PRESTADOR
|--------------------------------------------------------------------------
|
 */
Route::group(['middleware' => ['auth', 'can:fiscal']], function () {

    Route::get('/', function () {
        return view('fiscal.painel');
    })->name('fiscal.painel');
    Route::get('fiscal/prestadores', 'PrestadorController@index')->name('prestadores');
    Route::get('fiscal/prestador/cadastro', 'PrestadorController@cadastro')->name('prestador.cadastro');
    Route::post('fiscal/prestador/salvar', 'PrestadorController@salvar')->name('prestador.salvar');
    Route::get('fiscal/prestador/detalhes/{id}', 'PrestadorController@detalhes')->name('prestador.detalhes');
    Route::get('fiscal/prestador/edicao/{id}', 'PrestadorController@editar')->name('prestador.edicao');
    Route::put('fiscal/prestadores/{id}', 'PrestadorController@atualizar')->name('prestador.atualizar');
    Route::delete('fiscal/prestadores/{id}', 'PrestadorController@excluir')->name('prestador.excluir');
    Route::any('fiscal/prestadores/buscaPelaRazaoSocial', 'PrestadorController@buscaPelaRazaoSocial')->name('prestador.buscaPelaRazaoSocial');
    Route::get('fiscal/prestadores/verTodos', 'PrestadorController@verTodos')->name('prestador.verTodos');

});
