@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cadastrar Equipamento</h2>

        <form action="{{ route('equipamentos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome do Equipamento</label>
                <input type="text" class="form-control w-50" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de Equipamento</label>
                <input type="text" class="form-control w-50" id="tipo" name="tipo" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Equipamento</button>
        </form>
    </div>
@endsection
