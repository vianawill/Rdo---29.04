@extends('layouts.principal')

@section('titulo', 'Produtos')

@section('conteudo')

    <h1>Produtos</h1>

    @if ($busca != '')
        <p>O usuário está buscando por: {{ $busca }}</p>
    @endif

@endsection

<a href="/">Voltar para página inicial</a>

