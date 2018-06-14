@extends('adminlte::page')

@section('title', 'Transferir')

@section('content_header')
    <h1>Transferência</h1>
    <ol class="breadcrumb">
            <li><a href="">Dashboard</a></li>
            <li><a href="">Saldo</a></li>
            <li><a href="">Transferir</a></li>
        </ol>
@stop

@section('content')
    <div class="box">
        <box class="header">
            <h3>Fazer Transferência</h3>
        </box>
        <box class="box-body">
            @include('admin.includes.alerts')
            <form action="{{route('confirm.transfer')}}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="sender" class="form-control" placeholder="Informação de quem vai receber (Nome ou Email)">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Próxima Etapa</button>
                </div>
            </form>
        </box>
    </div>
@stop