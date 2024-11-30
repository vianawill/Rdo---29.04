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
                <th>Número do RDO</th>
                <th>Data</th>
                <th>Dia da semana</th>
                <th>Obra</th>
                <th>Manhã</th>
                <th>Tarde</th>
                <th>Noite</th>
                <th>Condição da área</th>
                <th>Acidente</th>
                <th>Equipamento</th>
                <th>Mão de Obra</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rdos as $rdo)
                <tr>
                    <td>{{ $rdo->numero_rdo }}</td>
                    <td>{{ $rdo->data }}</td>
                    <td>{{ $rdo->dia_da_semana }}</td>
                    <td>{{ $rdo->obra_id }}</td>
                    <td>{{ $rdo->manha }}</td>
                    <td>{{ $rdo->tarde }}</td>
                    <td>{{ $rdo->noite }}</td>
                    <td>{{ $rdo->condicao_area }}</td>
                    <td>{{ $rdo->acidente }}</td>
                    <td>@foreach ($rdo->equipamentos as $equipamento)
                            <li>{{ $equipamento->nome }}</li>
                        @endforeach</td>
                    <td>@foreach ($rdo->maoObras as $maoObra)
                            <li>{{ $maoObra->funcao }}</li>
                        @endforeach
                    </td>
                    
                    @can('editar-deletar')
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
