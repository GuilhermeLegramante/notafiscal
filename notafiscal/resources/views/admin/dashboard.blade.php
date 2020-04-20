@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>

@stop

@section('content')
{{-- @foreach ($tomadores as $tomador )
<table>
    <tr>
        <td>{{$tomador->nome}}</td>
    </tr>
</table>
@endforeach --}}

@include('flash::message')



<p>Welcome to this beautiful admin panel.</p>
@stop

@section('plugins.Datatables', true)

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop