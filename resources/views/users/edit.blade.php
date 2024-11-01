@extends('layouts.app')

@section('content')
    <h1>Editar Usuário</h1>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
        
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" value="{{ $user->cpf }}" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label for="password">Senha (deixe em branco para manter a mesma)</label>
        <input type="password" name="password">

        <button type="submit">Atualizar</button>
    </form>
@endsection
