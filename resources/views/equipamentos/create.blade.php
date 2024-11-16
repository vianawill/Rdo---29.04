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

            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" step="any" class="form-control w-25" id="quantidade" name="quantidade" required>
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

            <button type="submit" class="btn btn-primary">Cadastrar Equipamento</button>
        </form>
    </div>
@endsection
