<?php

namespace App\Http\Controllers;

use App\Escritorio;
use App\Prestador;
use Illuminate\Http\Request;
use App\Http\Requests\CriaAlteraPrestador;

class PrestadorController extends Controller
{
    private $repository;

    public function __construct(Prestador $prestador)
    {
        $this->repository = $prestador;
    }

    public function index()
    {
        $prestadores = $this->repository->paginate(15);

        return view('fiscal.prestador.prestadores', compact('prestadores'));
    }

    public function verTodos()
    {
        $total = $this->repository->count();
        $prestadores = $this->repository->paginate($total);

        return view('fiscal.prestador.prestadores', compact('prestadores'));

    }

    public function cadastro()
    {
        $escritorios = Escritorio::all();
        return view('fiscal.prestador.cadastro', compact('escritorios'));
    }

    public function salvar(CriaAlteraPrestador $request, Prestador $prestador)
    {

        $insert = $prestador->create($request->all());

        if ($insert) {
            return redirect()->route('fiscal.painel')->with('success', 'Prestador inserido com sucesso!');
        }

        return redirect()->back()->with('error', 'Falha ao inserir');

    }

    public function detalhes($id)
    {
        $prestador = $this->repository->find($id);
        $escritorio = Escritorio::where('id', '=', $prestador->escritorio_id)->first();

        if (!$prestador) {
            return redirect()->back();
        }

        return view('fiscal.prestador.detalhes', compact('prestador', 'escritorio'));
    }

    public function editar($id)
    {
        $prestador = $this->repository->find($id);
        $escritorio = Escritorio::where('id', '=', $prestador->escritorio_id)->first();
        $escritorios = Escritorio::all();

        if (!$prestador) {
            return redirect()->back();
        }

        return view('fiscal.prestador.edicao', compact('prestador', 'escritorio', 'escritorios'));
    }

    public function atualizar(Request $request, $id)
    {
        $prestador = $this->repository->find($id);

        if (!$prestador) {
            return redirect()->back();
        }

        $insert = $prestador->update($request->all());

        if ($insert) {
            return redirect()->route('prestadores')->with('success', 'Dados do Prestador alterados com sucesso!');
        }

        return redirect()->back()->with('error', 'Falha ao inserir');

    }

    public function excluir($id)
    {
        $prestador = $this->repository->find($id);

        if (!$prestador) {
            return redirect()->back();
        }

        $prestador->delete();

        return redirect()->route('prestadores')->with('success', 'Prestador excluído com sucesso!');
    }

    public function buscaPelaRazaoSocial(Request $request)
    {
        $pesquisa = $request->except('_token');

        $prestadores = $this->repository->buscaPelaRazaoSocial($request->pesquisa);

        return view('fiscal.prestador.prestadores', compact('prestadores', 'pesquisa'));
    }

    public function testeAjax(Request $request)
    {
        $cpfcnpj = $request->cpfcnpj;
        $email = $request->email;

        flash('Email enviado com sucesso! {{ $email }}')->success();

        return response()->json(['success' => 'Form is successfully submitted!']);
    }

}
