@extends('adminlte::page')

@section('title', 'Cadastrar Prestador')

@section('content_header')

@include('fiscal.includes.alerts')

@endsection

@section('content')
<h3 style="margin-top: -20px;">Dados Gerais</h3>
<form id="" action="{{ route('prestador.salvar') }}" class="form" method="post">
<div class="card">
    <div class="card-body">  
        @csrf
        <!-- primeira linha -->
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>CPF/CNPJ</label>
                    <input type="text" name="cpfcnpj" id="cpfcnpj" class="form-control" value="{{old('cpfcnpj')}}" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" maxlength="14">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Razão Social</label>
                    <input type="text" name="razaosocial" id="razaosocial" class="form-control" value="{{old('razaosocial')}}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Nome Fantasia</label>
                    <input type="text" name="nomefantasia" id="nomefantasia" class="form-control" value="{{old('nomefantasia')}}">
                </div>
            </div>
        </div>
        <!-- fim primeira linha -->

        <!-- segunda linha -->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Inscrição Municipal</label>
                    <input type="text" name="inscricaomunicipal" id="inscricaomunicipal" class="form-control" value="{{old('inscricaomunicipal')}}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Inscrição Estadual</label>
                    <input type="text" name="inscricaoestadual" id="inscricaoestadual" class="form-control" value="{{old('inscricaoestadual')}}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="form-control" value="{{old('telefone')}}">
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
                    onblur="pesquisacep(this.value);" value="{{old('cep')}}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Rua</label>
                    <input type="text" name="rua" id="rua" size="60" class="form-control" value="{{old('rua')}}">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label>Número</label>
                    <input type="text" name="numero" id="numero" class="form-control" value="{{old('numero')}}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Bairro</label>
                    <input type="text" name="bairro" id="bairro" size="40" class="form-control" value="{{old('bairro')}}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Cidade</label>
                    <input type="text" name="cidade" id="cidade" size="40" class="form-control" value="{{old('cidade')}}">
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label>UF</label>
                    <input type="text" name="uf" id="uf" size="2" class="form-control" value="{{old('uf')}}">
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
                        <option value="Simples Nacional">Simples Nacional</option>
                        <option value="Lucro Presumido">Lucro Presumido</option>
                        <option value="Lucro Real">Lucro Real</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Faixa do Simples Nacional</label>
                    <select name="faixasimplesnacional" id="faixasimplesnacional" class="form-control">
                        <option value="1">Até R$ 180.000,00</option>
                        <option value="2">De R$ 180.000,01 a R$ 360.000,00</option>
                        <option value="3">De R$ 360.000,01 a R$ 720.000,00</option>
                        <option value="4">De R$ 720.000,01 a R$ 1.800.000,00</option>
                        <option value="5">De R$ 1.800.000,01 a R$ R$ 3.600.000,00</option>
                        <option value="6">De R$ 3.600.000,01 a R$ 4.800.000,00</option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Alíquota (%)</label>
                    <input type="text" name="aliquota" id="aliquota" class="form-control" maxlength="4" value="{{old('aliquota')}}">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Exigibilidade ISSQN</label>
                    <select name="exigibilidadeissqn" id="exigibilidadeissqn" class="form-control">
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
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
                        <option value="Não">Não</option>
                        <option value="Sim">Sim</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Emissão de Recibo Provisório</label>
                    <select name="emissaoreciboprovisorio" id="emissaoreciboprovisorio" class="form-control">
                        <option value="Não">Não</option>
                        <option value="Sim">Sim</option>
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
                    Cadastrar 
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
<script>

function formatarCampo(campoTexto) {
    if (campoTexto.value.length <= 11) {
        campoTexto.value = mascaraCpf(campoTexto.value);
    } else {
        campoTexto.value = mascaraCnpj(campoTexto.value);
    }
}
function retirarFormatacao(campoTexto) {
    campoTexto.value = campoTexto.value.replace(/(\.|\/|\-)/g,"");
}
function mascaraCpf(valor) {
    return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
}
function mascaraCnpj(valor) {
    return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
}

// Máscara CEP
$("#cep").keydown(function(){
    $('#cep').mask('99999-000');
});

// Máscara Alíquota
$("#aliquota").keydown(function(){
    $('#aliquota').mask('##0.0', {reverse: true});
});

// Máscara Telefone
$("#telefone").keydown(function(){

    try {
        $("#telefone").unmask();
    } catch (e) {}

    var tamanho = $("#telefone").val().length;

    if(tamanho < 10){
        $("#telefone").mask("(99) 9999-9999");
    } else {
        $("#telefone").mask("(99) 99999-9999");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function(){
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});

function desabilitaSelect(elemento){
    if(($(elemento).val() == 'Lucro Presumido') || ($(elemento).val() == 'Lucro Real')){
        $('#faixasimplesnacional').attr('disabled', 'disabled');
        $("#faixasimplesnacional").val('');
    } else {
        $('#faixasimplesnacional').removeAttr('disabled');
        $("#faixasimplesnacional").val('1');
    }   
}

$(document).ready(function () {  
    $("input[type=text]").keyup(function () {  
        $(this).val($(this).val().toUpperCase());  
    });
    
});

/*
FUNÇÕES PARA REÚSO
*/
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);

        document.getElementById('rua').val().toUpperCase();
        document.getElementById('bairro').val().toUpperCase();
        document.getElementById('cidade').val().toUpperCase();
        document.getElementById('rua').val().toUpperCase();


    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        swal("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            swal("Informe o CEP no formato válido. Ex. 00000-000");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};


</script>
@stop