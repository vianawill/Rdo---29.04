@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Equipamentos</h1>
        <a href="{{ route('equipamentos.create') }}" class="btn btn-primary">Cadastrar Equipamento</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipamentos as $equipamento)
                <tr>
                    <td>{{ $equipamento->nome }}</td>
                    <td>{{ $equipamento->tipo }}</td>
                    
                    @can('acoes-gerente')
                        <td>
                            <a href="{{ route('equipamentos.edit', $equipamento) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('equipamentos.destroy', $equipamento) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
