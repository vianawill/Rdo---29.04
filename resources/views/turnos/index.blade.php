@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Turnos</h1>
    <a href="{{ route('turnos.create') }}" class="btn btn-primary mb-3">Novo Turno</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Turno</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($turnos as $turno)
                <tr>
                    <td>{{ $turno->id }}</td>
                    <td>{{ $turno->turno }}</td>
                    <td>
                        <a href="{{ route('turnos.edit', $turno) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('turnos.destroy', $turno) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection