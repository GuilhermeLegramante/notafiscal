<?php

namespace App\Http\Controllers;

use App\Nfse;
use App\Prestador;
use Illuminate\Http\Request;

class NfseController extends Controller
{
    private $repository;

    public function __construct(Nfse $nfse)
    {

        $this->repository = $nfse;
    }

    public function index()
    {

    }

    public function emissaoPrimeiraEtapa()
    {
        $prestador_id = auth()->user()->prestador_id;
        $prestador = Prestador::where('id', '=', $prestador_id)->first();

        $totalNfse = Nfse::where('prestador_id', '=', $prestador->id)->count();
        $numero = $totalNfse + 1;

        $ano = date("Y");

        return view('prestador.nfse.emissao.primeiraetapa', compact('numero', 'ano', 'prestador'));
    }

    public function emissaoSegundaEtapa(Request $request)
    {
        $dados = $request->all();

        return view('prestador.nfse.emissao.segundaetapa', compact('dados'));

    }

    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }

    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

}
