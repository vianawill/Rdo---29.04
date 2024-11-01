@extends('layouts.app')

@section('content')
    <h1>Criar Usuário</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Nome</label>
        <input type="text" name="name" required>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="password">Senha</label>
        <input type="password" name="password" required>

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" required>

        <button type="submit">Criar</button>
    </form>
@endsection
