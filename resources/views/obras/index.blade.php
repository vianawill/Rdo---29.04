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
                <th>Empresa Contratada</th>
                <th>Objeto do Contrato</th>
                <th>Tempo Total do Contrato</th>
                <th>Data Prevista Início</th>
                <th>Data Real Início</th>
                <th>Data Prevista Término</th>
                <th>Data Real Término</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obras as $obra)
                <tr>
                    <td>{{ $obra->nome }}</td>
                    <td>{{ $obra->empresa_contratada }}</td>
                    <td>{{ $obra->objeto_contrato }}</td>
                    <td>{{ $obra->tempo_total_contrato }}</td>
                    <td>{{ $obra->data_prevista_inicio_obra }}</td>
                    <td>{{ $obra->data_real_inicio_obra ?? 'N/A' }}</td>
                    <td>{{ $obra->data_prevista_termino_obra }}</td>
                    <td>{{ $obra->data_real_termino_obra ?? 'N/A' }}</td>
                    
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
