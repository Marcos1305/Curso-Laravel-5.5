@extends('adminlte::page')

@section('title', 'Confirmar transferência Saldo')

@section('content_header')
    <h1>Transferir Saldo</h1>
    <ol class="breadcrumb">
            <li><a href="">Dashboard</a></li>
            <li><a href="">Saldo</a></li>
            <li><a href="">Transferir</a></li>
            <li><a href="">Confirmação</a></li>
        </ol>
@stop

@section('content')
    <div class="box">
        <box class="header">
            <h3>Confirmar transferência saldo para {{$sender->name}}</h3>
        </box>
        <box class="box-body">
            @include('admin.includes.alerts')
            <p><strong>Nome do Recebedor: </strong> {{$sender->name}}</p>
            <p><strong>Email do Recebedor: </strong> {{$sender->email}}</p>
            <p><strong>Seu saldo atual: </strong>R$ {{number_format($balance->amount, 2, ',', '')}}</p>
            
            <form action="{{route('transfer.store')}}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="sender_id" value="{{$sender->id}}">
                <div class="form-group">
                    <input type="text" name="value" class="form-control" placeholder="Valor:">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>
            </form>
        </box>
    </div>
@stop