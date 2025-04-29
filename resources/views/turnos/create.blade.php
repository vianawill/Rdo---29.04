@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Turno</h1>

    <form action="{{ route('turnos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="turno" class="form-label">Nome do Turno</label>
            <input type="text" name="turno" id="turno" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('turnos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection