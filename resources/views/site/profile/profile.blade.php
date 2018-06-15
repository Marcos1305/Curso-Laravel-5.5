@extends('site.layouts.app')
@section('title', 'Meu Perfim')
@section('content')
<h1>Meu Perfil</h1>
@include('admin.includes.alerts')
<form action="{{route('profile.update')}}" method="post">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name">Nome</label>
    <input class="form-control" value="{{auth()->user()->name}}"type="text" name="name" placeholder="Nome" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
    <input class="form-control" value="{{auth()->user()->email}}"type="email" name="email" placeholder="E-mail">
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input class="form-control" type="password" name="password" placeholder="Senha">
    </div>
    <div class="form-group">
        <label for="image">Imagem:</label>
        <input class="form-control" type="file" name="image">
    </div>
    <div class="form-group">
        <button class="btn btn-info"type="submit">Atualizar</button>
    </div>
</form>
@endsection