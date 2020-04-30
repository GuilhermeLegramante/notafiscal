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
Route::get('/teste2', function () {
    $array = ['sdkfj', 'dsjflkl', 'lksdjfl'];

    $array2 = [
        [
            'nome' => 'Guilherme',
        ],
        [
            'nome' => 'João',
        ],
    ];

    return $array2;
});

Route::get('/contato/{name}', function ($name) {
    return "Olá Mundo! {$name}";
});

Route::get('/', function () {
    $teste = [
        'nome' => 'Guilherme',
    ];
    $obj = (object) $teste;
    return view('welcome', compact('obj'));
});


Route::get('/notificacao', 'NotaFiscalController@notificacao');

Route::get('/testeShow/{id}', 'NotaFiscalController@showById')->name('showById');

Route::get('/welcome', 'NotaFiscalController@welcome');

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

Route::resource('prestadores', 'PrestadorController');

Route::group(['middleware' => 'auth'], function(){
    Route::get('admin/prestadores', 'PrestadorController@index');
    Route::get('admin/cadastrarPrestador', 'PrestadorController@cadastrarPrestador')->name('cadastrarPrestador');
    Route::get('admin/detalhesPrestador/{id}', 'PrestadorController@detalhesPrestador')->name('detalhesPrestador');    
});


