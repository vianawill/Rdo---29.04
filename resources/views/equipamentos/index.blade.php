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
                <th>CPF</th>
                <th>Email</th>
                <th>Nível de acesso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipamentos as $equipamento)
                <tr>
                    <td>{{ $equipamento->name }}</td>
                    <td>{{ $equipamento->cpf }}</td>
                    <td>{{ $equipamento->email }}</td>
                    <td>{{ $equipamento->access_level }}</td>
                    
                    @can('del-equipamento')
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
