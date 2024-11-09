@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>RDOs</h1>
        <a href="{{ route('rdos.create') }}" class="btn btn-primary">Cadastrar RDO</a>
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
            @foreach ($rdos as $rdo)
                <tr>
                    <td>{{ $rdo->name }}</td>
                    <td>{{ $rdo->cpf }}</td>
                    <td>{{ $rdo->email }}</td>
                    <td>{{ $rdo->access_level }}</td>
                    
                    @can('del-rdo')
                        <td>
                            <a href="{{ route('rdos.edit', $rdo) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('rdos.destroy', $rdo) }}" method="POST" style="display:inline;">
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
