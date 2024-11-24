@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cadastrar Mão de Obra</h2>

        <form action="{{ route('mao_obras.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="funcao">Função do Trabalhador</label>
                <input type="text" class="form-control w-50" id="funcao" name="funcao" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Mão de Obra</button>
        </form>
    </div>
@endsection
