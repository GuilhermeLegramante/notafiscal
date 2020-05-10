@extends('adminlte::page')

@section('title', 'Emitir NFS-e')

@section('content_header')

@include('includes.alerts')

@endsection

@section('content')
<form id="" action="" class="form" method="post">
<h3>Dados do Tomador</h3>
<div class="card">
    <div class="card-body">  
        @csrf
        <!-- primeira linha -->
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>CPF/CNPJ</label>
                    <input type="text" name="cpfcnpjtomador" id="cpfcnpj" class="form-control" value="{{old('cpfcnpj')}}" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" maxlength="14" required>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Razão Social</label>
                    <input type="text" name="razaosocialtomador" id="razaosocial" class="form-control" value="{{old('razaosocial')}}" required>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nome Fantasia</label>
                    <input type="text" name="nomefantasiatomador" id="nomefantasia" class="form-control" value="{{old('nomefantasia')}}">
                </div>
            </div>
        </div>
        <!-- fim primeira linha -->

        <!-- segunda linha -->
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="emailtomador" id="email" class="form-control" value="{{old('email')}}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefonetomador" id="telefone" class="form-control" value="{{old('telefone')}}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>CEP</label>
                    <input type="text" name="ceptomador" id="cep" class="form-control" size="10" maxlength="9"
                    onblur="pesquisacep(this.value);" value="{{old('cep')}}">
                </div>
            </div>
        </div>
        <!-- fim segunda linha -->

        <!-- terceira linha -->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Rua</label>
                    <input type="text" name="ruatomador" id="rua" size="60" class="form-control" value="{{old('rua')}}">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label>Número</label>
                    <input type="text" name="numerotomador" id="numero" class="form-control" value="{{old('numero')}}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Bairro</label>
                    <input type="text" name="bairrotomador" id="bairro" size="40" class="form-control" value="{{old('bairro')}}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Cidade</label>
                    <input type="text" name="cidadetomador" id="cidade" size="40" class="form-control" value="{{old('cidade')}}">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label>UF</label>
                    <input type="text" name="uftomador" id="uf" size="2" class="form-control" value="{{old('uf')}}">
                </div>
            </div>
        </div>
        <!-- fim terceira linha -->  
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <button type="submit" class="btn btn-success" style="width: 50%;">
                    Avançar 
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

</form>


@endsection

@section('plugins.Datatables', true)

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
<script src="{{asset('js/custom.js')}}"></script>
@stop