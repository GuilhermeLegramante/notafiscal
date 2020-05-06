@extends('adminlte::page')

@section('title', 'Editar Dados Prestador')

@section('content')
<h3 style="margin-top: -20px;">Dados Gerais</h3>
<form id="" action="{{ route('prestador.atualizar', $prestador->id) }}" class="form" method="post">
<div class="card">
    <div class="card-body">  
        @csrf
        @method('PUT')

        <!-- primeira linha -->
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>CPF/CNPJ</label>
                    <input type="text" name="cpfcnpj" id="cpfcnpj" class="form-control" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" maxlength="14" value="{{ $prestador->cpfcnpj }}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Razão Social</label>
                    <input type="text" name="razaosocial" id="razaosocial" class="form-control" value="{{ $prestador->razaosocial }}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nome Fantasia</label>
                    <input type="text" name="nomefantasia" id="nomefantasia" class="form-control" value="{{ $prestador->nomefantasia }}">
                </div>
            </div>
        </div>
        <!-- fim primeira linha -->

        <!-- segunda linha -->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Inscrição Municipal</label>
                    <input type="text" name="inscricaomunicipal" id="inscricaomunicipal" class="form-control" value="{{ $prestador->inscricaomunicipal }}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Inscrição Estadual</label>
                    <input type="text" name="inscricaoestadual" id="inscricaoestadual" class="form-control" value="{{ $prestador->inscricaoestadual }}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $prestador->email }}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="form-control" value="{{ $prestador->telefone }}">
                </div>
            </div>
        </div>
        <!-- fim segunda linha -->

        <!-- terceira linha -->
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label>CEP</label>
                    <input type="text" name="cep" id="cep" class="form-control" size="10" maxlength="9"
                    onblur="pesquisacep(this.value);" value="{{ $prestador->cep }}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Rua</label>
                    <input type="text" name="rua" id="rua" size="60" class="form-control" value="{{ $prestador->rua }}">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label>Número</label>
                    <input type="text" name="numero" id="numero" class="form-control" value="{{ $prestador->numero }}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Bairro</label>
                    <input type="text" name="bairro" id="bairro" size="40" class="form-control" value="{{ $prestador->bairro }}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Cidade</label>
                    <input type="text" name="cidade" id="cidade" size="40" class="form-control" value="{{ $prestador->cidade }}">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label>UF</label>
                    <input type="text" name="uf" id="uf" size="2" class="form-control" value="{{ $prestador->uf }}">
                </div>
            </div>
        </div>
        <!-- fim terceira linha -->  
    </div>
</div>

<h3>Informações Adicionais</h3>

<div class="card">
    <div class="card-body">
        <!-- primeira linha -->
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Escritório de Contabilidade</label>
                    <select name="escritorio_id" id="escritorio_id" class="form-control">
                    <option value="{{ $escritorio->id}}">{{ $escritorio->razaosocial}}</option>
                        @foreach ($escritorios as $escritorio)
                            <option value="{{ $escritorio->id}}"> {{$escritorio->razaosocial}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <!-- fim primeira linha -->
        <!-- primeira linha -->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Regime Tributário</label>
                    <select onchange="desabilitaSelect(this)" name="regimetributario" id="regimetributario" class="form-control">
                        @if ($prestador->regimetributario == 'Simples Nacional'){
                            <option value="Simples Nacional" selected>Simples Nacional</option>
                            <option value="Lucro Presumido">Lucro Presumido</option>
                            <option value="Lucro Real">Lucro Real</option>
                        @endif
                        @if ($prestador->regimetributario == 'Lucro Presumido'){
                            <option value="Simples Nacional" selected>Simples Nacional</option>
                            <option value="Lucro Presumido" selected>Lucro Presumido</option>
                            <option value="Lucro Real">Lucro Real</option>
                        @endif
                        @if ($prestador->regimetributario == 'Lucro Real'){
                            <option value="Simples Nacional" selected>Simples Nacional</option>
                            <option value="Lucro Presumido">Lucro Presumido</option>
                            <option value="Lucro Real" selected>Lucro Real</option>
                        @endif
                        
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Faixa do Simples Nacional</label>
                    <select name="faixasimplesnacional" id="faixasimplesnacional" class="form-control">
                        @if ($prestador->faixasimplesnacional == '1')
                            <option value="1" selected>Até R$ 180.000,00</option>
                            <option value="2">De R$ 180.000,01 a R$ 360.000,00</option>
                            <option value="3">De R$ 360.000,01 a R$ 720.000,00</option>
                            <option value="4">De R$ 720.000,01 a R$ 1.800.000,00</option>
                            <option value="5">De R$ 1.800.000,01 a R$ R$ 3.600.000,00</option>
                            <option value="6">De R$ 3.600.000,01 a R$ 4.800.000,00</option>
                            <option value=""></option>
                        @endif
                        @if ($prestador->faixasimplesnacional == '2')
                            <option value="1">Até R$ 180.000,00</option>
                            <option value="2" selected>De R$ 180.000,01 a R$ 360.000,00</option>
                            <option value="3">De R$ 360.000,01 a R$ 720.000,00</option>
                            <option value="4">De R$ 720.000,01 a R$ 1.800.000,00</option>
                            <option value="5">De R$ 1.800.000,01 a R$ R$ 3.600.000,00</option>
                            <option value="6">De R$ 3.600.000,01 a R$ 4.800.000,00</option>
                            <option value=""></option>
                        @endif
                        @if ($prestador->faixasimplesnacional == '3')
                            <option value="1">Até R$ 180.000,00</option>
                            <option value="2">De R$ 180.000,01 a R$ 360.000,00</option>
                            <option value="3" selected>De R$ 360.000,01 a R$ 720.000,00</option>
                            <option value="4">De R$ 720.000,01 a R$ 1.800.000,00</option>
                            <option value="5">De R$ 1.800.000,01 a R$ R$ 3.600.000,00</option>
                            <option value="6">De R$ 3.600.000,01 a R$ 4.800.000,00</option>
                            <option value=""></option>
                        @endif
                        @if ($prestador->faixasimplesnacional == '4')
                            <option value="1">Até R$ 180.000,00</option>
                            <option value="2">De R$ 180.000,01 a R$ 360.000,00</option>
                            <option value="3">De R$ 360.000,01 a R$ 720.000,00</option>
                            <option value="4" selected>De R$ 720.000,01 a R$ 1.800.000,00</option>
                            <option value="5">De R$ 1.800.000,01 a R$ R$ 3.600.000,00</option>
                            <option value="6">De R$ 3.600.000,01 a R$ 4.800.000,00</option>
                            <option value=""></option>
                        @endif
                        @if ($prestador->faixasimplesnacional == '5')
                            <option value="1">Até R$ 180.000,00</option>
                            <option value="2">De R$ 180.000,01 a R$ 360.000,00</option>
                            <option value="3">De R$ 360.000,01 a R$ 720.000,00</option>
                            <option value="4">De R$ 720.000,01 a R$ 1.800.000,00</option>
                            <option value="5" selected>De R$ 1.800.000,01 a R$ R$ 3.600.000,00</option>
                            <option value="6">De R$ 3.600.000,01 a R$ 4.800.000,00</option>
                            <option value=""></option>
                        @endif
                        @if ($prestador->faixasimplesnacional == '6')
                            <option value="1">Até R$ 180.000,00</option>
                            <option value="2">De R$ 180.000,01 a R$ 360.000,00</option>
                            <option value="3">De R$ 360.000,01 a R$ 720.000,00</option>
                            <option value="4">De R$ 720.000,01 a R$ 1.800.000,00</option>
                            <option value="5">De R$ 1.800.000,01 a R$ R$ 3.600.000,00</option>
                            <option value="6" selected>De R$ 3.600.000,01 a R$ 4.800.000,00</option>
                            <option value=""></option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alíquota (%)</label>
                    <input type="text" name="aliquota" id="aliquota" class="form-control" maxlength="4" value="{{$prestador->aliquota}}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Exigibilidade ISSQN</label>
                    <select name="exigibilidadeissqn" id="exigibilidadeissqn" class="form-control">
                        @if ($prestador->exigibilidadeissqn == 'Sim')
                            <option value="Sim" selected>Sim</option>
                            <option value="Não">Não</option>
                        @endif
                        @if ($prestador->exigibilidadeissqn == 'Não')
                            <option value="Sim">Sim</option>
                            <option value="Não" selected>Não</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <!-- fim primeira linha -->

        <!-- segunda linha -->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Emissão de Nota Fiscal</label>
                    <select name="emissaonotafiscal" id="emissaonotafiscal" class="form-control">
                        @if ($prestador->emissaonotafiscal == 'Sim')
                            <option value="Sim" selected>Sim</option>
                            <option value="Não">Não</option>
                        @endif
                        @if ($prestador->emissaonotafiscal == 'Não')
                            <option value="Sim">Sim</option>
                            <option value="Não" selected>Não</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Emissão de Recibo Provisório</label>
                    <select name="emissaoreciboprovisorio" id="emissaoreciboprovisorio" class="form-control">
                        @if ($prestador->emissaoreciboprovisorio == 'Sim')
                            <option value="Sim" selected>Sim</option>
                            <option value="Não">Não</option>
                        @endif
                        @if ($prestador->emissaoreciboprovisorio == 'Não')
                            <option value="Sim">Sim</option>
                            <option value="Não" selected>Não</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <!-- fim segunda linha -->
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <button type="submit" class="btn btn-success" style="width: 50%;">
                    Salvar 
                    <i class="fas fa-save"></i>
                </button>
            </div>
        </div>
    </div>
</div>

</form>
@stop

@section('plugins.Datatables', true)

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
<script src="{{asset('js/custom.js')}}"></script>
@stop