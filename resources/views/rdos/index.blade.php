@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de RDOs</h1>
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
                <th>RDO</th>
                <th>Data</th>
                <th>Obra</th>
                <th>Empresa Contratada</th>
                <th>Objeto do Contrato</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rdos as $rdo)
                <tr>
                    <td>{{ $rdo->numero_rdo }}</td>
                    <td>{{ \Carbon\Carbon::parse($rdo->data)->format('d/m/Y') }}</td>
                    <td>{{ $rdo->obras->nome }}</td>
                    <td>{{ $rdo->obras->empresa_contratada }}</td>
                    <td>{{ $rdo->obras->objeto_contrato }}</td>        
                        <!-- <thead> // tirei para ficar mais limpo a tela de index
                                <tr>
                                    <th>Condição da área</th>
                                    <th>Acidente</th>
                                    <th>Equipamento</th>
                                    <th>Mão de Obra</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $rdo->condicao_area }}</td>
                                    <td>{{ $rdo->acidente }}</td>
                                    <td>@foreach ($rdo->equipamentos as $equipamento)
                                            <li>{{ $equipamento->nome }}</li>
                                        @endforeach</td>
                                    <td>@foreach ($rdo->maoObras as $maoObra)
                                            <li>{{ $maoObra->funcao }}</li>
                                        @endforeach
                                    </td> 
                                </tr>   -->
                    <td>
                        <a href="{{ route('rdos.show', $rdo) }}" class="btn btn-info">Abrir</a>
                        @can('editar-deletar')
                            <a href="{{ route('rdos.edit', $rdo) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('rdos.destroy', $rdo) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
