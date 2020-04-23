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

// Route::get('/{name}', function ($name) {
//     return view('welcome', compact($name));
// });

Auth::routes();

Route::get('admin', function(){
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/notificacao', 'NotaFiscalController@notificacao');

Route::get('/teste', 'NotaFiscalController@printNf');

Route::get('/testeQB', 'NotaFiscalController@testeQB');

Route::get('/login-old', 'NotaFiscalController@logar');

Route::get('/testeShow/{id}', 'NotaFiscalController@showById')->name('showById');

Route::get('/welcome', 'NotaFiscalController@welcome');

Route::get('testeFlash', function(){
    return view('admin.dashboard');
})->name('testeFlash');

Route::get('/', function(){
    return view('admin.login');
});

//Route::resource('notafiscal', 'NotaFiscalController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
