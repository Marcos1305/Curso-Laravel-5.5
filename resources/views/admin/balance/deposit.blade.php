@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Fazer Recarga</h1>
    <ol class="breadcrumb">
            <li><a href="">Dashboard</a></li>
            <li><a href="">Saldo</a></li>
            <li><a href="">Depositar</a></li>
        </ol>
@stop

@section('content')
    <div class="box">
        <box class="header">
            <h3>Fazer Recarga</h3>
        </box>
        <box class="box-body">
            @include('admin.includes.alerts')
            <form action="{{route('deposit.store')}}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="value" class="form-control" placeholder="Valor">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Recarregar</button>
                </div>
            </form>
        </box>
    </div>
@stop