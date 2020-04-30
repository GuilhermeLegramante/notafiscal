@extends('adminlte::page')


@section('title', 'Prestadores')

@section('content_header')
<h1>Prestadores</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@stop

@section('content')

<div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>CPF/CNPJ</th>
                        <th>Razão Social</th>
                        <th>Nome Fantasia</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestadores as $prestador )
                        <tr>
                            <td>{{$prestador->cpfcnpj}}</td>
                            <td>{{$prestador->razaosocial}}</td>
                            <td>{{$prestador->nomefantasia}}</td>
                            <td>{{$prestador->email}}</td>
                            <td>{{$prestador->telefone}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('detalhesPrestador', $prestador->id ) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Detalhar"><i class="fas fa-info-circle"></i></a>
                                    <a href="" class="btn btn-success btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Excluir"><i class="fas fa-trash"></i></a>    
                                </div>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
            
            <div class="d-flex">
                <div class="mx-auto">
                    {{$prestadores->links()}}
                </div>
            </div>
        </div>
    </div>

</div>




@stop

@section('plugins.Datatables', true)

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
<script>
    
</script>
@stop