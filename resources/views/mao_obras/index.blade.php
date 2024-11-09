@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Mão de obra</h1>
        <a href="{{ route('mao_obras.create') }}" class="btn btn-primary">Cadastrar Mão de Obra</a>
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
            @foreach ($mao_obras as $mao_obra)
                <tr>
                    <td>{{ $mao_obra->name }}</td>
                    <td>{{ $mao_obra->cpf }}</td>
                    <td>{{ $mao_obra->email }}</td>
                    <td>{{ $mao_obra->access_level }}</td>
                    
                    @can('del-mao_obra')
                        <td>
                            <a href="{{ route('mao_obras.edit', $mao_obra) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('mao_obras.destroy', $mao_obra) }}" method="POST" style="display:inline;">
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
