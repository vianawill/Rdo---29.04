@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Turno</h1>

    <form action="{{ route('turnos.update', $turno) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="turno" class="form-label">Nome do Turno</label>
            <input type="text" name="turno" id="turno" value="{{ $turno->turno }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('turnos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
