@extends('layouts.principal')

@section('title', 'Produto')

@section('conteudo')

@if ($id != null)
    <h1>Exibindo produto: {{ $id }}</h1>
@endif

<a href="/">Voltar para página inicial</a>

@endsection