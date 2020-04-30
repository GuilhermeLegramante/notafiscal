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

Route::get('testeGate', function(){
    return view('admin.novoPrestador');
})->middleware('can:fiscal');

// Fim rotas de teste



/*
    Rotas válidas
*/

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('admin', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin');

// CRUD Prestador
Route::group(['middleware' => ['auth', 'can:fiscal']], function(){
    Route::get('admin/prestadores', 'PrestadorController@index')->name('prestadores');
    Route::get('admin/prestador/cadastro', 'PrestadorController@cadastro')->name('prestador.cadastro');
    Route::post('admin/prestador/salvar', 'PrestadorController@salvar')->name('prestador.salvar');
    Route::get('admin/prestador/detalhes/{id}', 'PrestadorController@detalhes')->name('prestador.detalhes');
    Route::get('admin/prestador/edicao/{id}', 'PrestadorController@editar')->name('prestador.edicao');
    Route::put('admin/prestadores/{id}', 'PrestadorController@atualizar')->name('prestador.atualizar'); 
});





