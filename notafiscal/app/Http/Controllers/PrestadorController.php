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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Prestador $prestador)
    {

        // Insere um novo prestador, de acordo com os dados informados pelo usuário
        $insert = $prestador->create($request->all());

        // Verifica se inseriu com sucesso
        // Redireciona para a listagem das categorias
        // Passa uma session flash success (sessão temporária)
        if ($insert) {
            return redirect()
                ->route('admin')
                ->with('success', 'Prestador inserido com sucesso!');
        }

        // Redireciona de volta com uma mensagem de erro
        return redirect()
            ->back()
            ->with('error', 'Falha ao inserir');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalhesPrestador($id)
    {
        $prestador = $this->repository->find($id);
        $escritorio = Escritorio::where('id', '=', $prestador->escritorio_id)->first();

        if(!$prestador){
            return redirect()->back();
        }

        return view('admin.prestador.detalhesPrestador', compact('prestador', 'escritorio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function cadastrarPrestador()
    {
        $escritorios = Escritorio::all();

        return view('admin.prestador.cadastrarPrestador', compact('escritorios'));

    }

    public function testeAjax(Request $request)
    {
        $cpfcnpj = $request->cpfcnpj;
        $email = $request->email;

        flash('Email enviado com sucesso! {{ $email }}')->success();

        return response()->json(['success' => 'Form is successfully submitted!']);
    }
}
