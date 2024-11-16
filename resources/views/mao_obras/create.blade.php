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

            <div class="form-group">
                <label for="quantidade">Quantidade de Trabalhadores</label>
                <input type="number" class="form-control w-25" id="quantidade" name="quantidade" required>
            </div>

            <div class="form-group">
                <label for="horas_trabalhadas">Horas Trabalhadas</label>
                <input type="number" step="any" class="form-control w-25" id="horas_trabalhadas" name="horas_trabalhadas" required>
            </div>

            <!-- teste - cadastrar sem esse campo
            <div class="form-group">
                <label for="obra_id">Obra</label>
                <select class="form-control" id="obra_id" name="obra_id" required>
                    @foreach($obras as $obra)
                        <option value="{{ $obra->id }}">{{ $obra->objeto_contrato }} - {{ $obra->empresa_contratada }}</option>
                    @endforeach
                </select>
            </div>
            -->

            <button type="submit" class="btn btn-primary">Cadastrar Mão de Obra</button>
        </form>
    </div>
@endsection
