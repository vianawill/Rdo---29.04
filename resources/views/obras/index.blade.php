@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Obras</h1>
        <a href="{{ route('obras.create') }}" class="btn btn-primary">Cadastrar Obra</a>
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
            @foreach ($obras as $obra)
                <tr>
                    <td>{{ $obra->name }}</td>
                    <td>{{ $obra->cpf }}</td>
                    <td>{{ $obra->email }}</td>
                    <td>{{ $obra->access_level }}</td>
                    
                    @can('del-obra')
                        <td>
                            <a href="{{ route('obras.edit', $obra) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('obras.destroy', $obra) }}" method="POST" style="display:inline;">
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
