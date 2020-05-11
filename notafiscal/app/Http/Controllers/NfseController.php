<?php

namespace App\Http\Controllers;

use App\Nfse;
use App\Prestador;
use DB;
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
        $numeronfse = $totalNfse + 1;

        $ano = date("Y");

        return view('prestador.nfse.emissao.primeiraetapa', compact('numeronfse', 'ano', 'prestador'));
    }

    public function emissaoSegundaEtapa(Request $request)
    {
        $dados = $request->all();

        $id = $request->id;

        // Busca CNAES do Prestador
        $cnaes = DB::select('SELECT * FROM `cnae` inner join `prestador_cnae` on cnae.id = prestador_cnae.cnae_id
        where prestador_cnae.prestador_id = ? ', [$id]);

        // Busca Atividades do Prestador
        $atividades = DB::select('SELECT * FROM `atividades` inner join `prestador_atividades` on atividades.id = prestador_atividades.atividades_id
        where prestador_atividades.prestador_id = ? ', [$id]);

        return view('prestador.nfse.emissao.segundaetapa', compact('dados', 'cnaes', 'atividades'));

    }

    public function emissaoTerceiraEtapa(Request $request)
    {
        // Recupera os dados das etapas anteriores
        $dadosNfse = $request->dados;

        // Dados do Serviço 1
        $cnae = $request->cnaes;
        $atividades = $request->atividades;
        $valor = $request->valor;
        $deducoes = $request->deducoes;
        $descontocondicionado = $request->descontocondicionado;
        $descontoincondicionado = $request->descontoincondicionado;
        $aliquota = $request->aliquota;
        $exigibilidadeissvariavel = $request->aliquota;

        // Dados do Serviço 2
        if ($request->has('cnaes_2')) {
            $cnae_2 = $request->cnaes_2;
            $atividades_2 = $request->atividades_2;
            $valor_2 = $request->valor_2;
            $deducoes_2 = $request->deducoes_2;
            $descontocondicionado_2 = $request->descontocondicionado_2;
            $descontoincondicionado_2 = $request->descontoincondicionado_2;
            $aliquota_2 = $request->aliquota_2;
            $exigibilidadeissvariavel_2 = $request->aliquota_2;
        }

        // Dados do Serviço 3
        if ($request->has('cnaes_3')) {
            $cnae_3 = $request->cnaes_3;
            $atividades_3 = $request->atividades_3;
            $valor_3 = $request->valor_3;
            $deducoes_3 = $request->deducoes_3;
            $descontocondicionado_3 = $request->descontocondicionado_3;
            $descontoincondicionado_3 = $request->descontoincondicionado_3;
            $aliquota_3 = $request->aliquota_3;
            $exigibilidadeissvariavel_3 = $request->aliquota_3;
        }
        

        

        $dadosNfse = json_decode($dados);

        dd($dadosNfse);
    }

}
