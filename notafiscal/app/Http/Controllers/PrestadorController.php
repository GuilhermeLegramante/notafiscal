<?php

namespace App\Http\Controllers;

use App\Escritorio;
use App\Prestador;
use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    private $repository;

    public function __construct(Prestador $prestador)
    {
        $this->repository = $prestador;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestadores = $this->repository->paginate(1);

        return view('admin.prestador.prestadores', compact('prestadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cadastro()
    {
        $escritorios = Escritorio::all();
        return view('admin.prestador.cadastro', compact('escritorios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request, Prestador $prestador)
    {

        $insert = $prestador->create($request->all());

        if ($insert) {
            return redirect()->route('admin')->with('success', 'Prestador inserido com sucesso!');
        }

        return redirect()->back()->with('error', 'Falha ao inserir');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalhes($id)
    {
        $prestador = $this->repository->find($id);
        $escritorio = Escritorio::where('id', '=', $prestador->escritorio_id)->first();

        if (!$prestador) {
            return redirect()->back();
        }

        return view('admin.prestador.detalhes', compact('prestador', 'escritorio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $prestador = $this->repository->find($id);
        $escritorio = Escritorio::where('id', '=', $prestador->escritorio_id)->first();
        $escritorios = Escritorio::all();

        if (!$prestador) {
            return redirect()->back();
        }

        return view('admin.prestador.edicao', compact('prestador', 'escritorio', 'escritorios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function testeAjax(Request $request)
    {
        $cpfcnpj = $request->cpfcnpj;
        $email = $request->email;

        flash('Email enviado com sucesso! {{ $email }}')->success();

        return response()->json(['success' => 'Form is successfully submitted!']);
    }
}
