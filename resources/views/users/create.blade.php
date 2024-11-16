@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Criar Usuário</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" required>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-5">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>
@endsection
