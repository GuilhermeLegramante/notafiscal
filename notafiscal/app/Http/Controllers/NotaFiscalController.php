<?php

namespace App\Http\Controllers;

use DB;
use App\User;

class NotaFiscalController extends Controller
{
    public function printNf()
    {

        return view('auth.login');
    }

    public function testeQB()
    {
        $tomadores = DB::select('select * from tomador');

        return view('admin.dashboard', ['tomadores' => $tomadores]);
    }

    public function showById($id)
    {
        flash('Deu certo a inclusão das mensagens!')->success();
        return view('admin.dashboard', compact('id'));
    }

    public function welcome()
    {
        flash('Deu certo a inclusão das mensagens!')->success();
        return redirect()->route('testeFlash');
    }

    public function notificacao()
    {
        $user = new User();
        $user->testeNotificacao();
        return view('admin.dashboard');
    }
}
