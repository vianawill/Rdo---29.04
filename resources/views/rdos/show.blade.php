@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded">
                    <div class="card-header text-center bg-white">
                        <h4>Relatório Diário de Obra - {{ \Carbon\Carbon::parse($rdo->data)->format('d/m/Y') }}</h4>
                    </div>
                    <div class="card-header text-center">
                        <h5>RDO {{ $rdo->numero_rdo }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Obra:</strong>
                                <p>{{ $rdo->obras->nome }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Empresa Contratada:</strong>
                                <p>{{ $rdo->obras->empresa_contratada }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Objeto do Contrato:</strong>
                                <p>{{ $rdo->obras->objeto_contrato }}</p>
                            </div>
                        </div>
                        <h6 class="text-center bg-light">Condição do tempo</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Manhã:</strong>
                                <p>{{ $rdo->manha }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Tarde:</strong>
                                <p>{{ $rdo->tarde }}</p>
                            </div>
                            <div class="col-md-4">
                                <strong>Noite:</strong>
                                <p>{{ $rdo->noite }}</p>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Condição da área:</strong>
                                    <p>{{ $rdo->condicao_area }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Acidente:</strong>
                                    <p>{{ $rdo->acidente }}</p>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong>Equipamentos utilizados:</strong>
                                        <ul>
                                            @foreach($rdo_equipamento as $equipamento)
                                                <li>{{ $equipamento->nome }}</li>  
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong>Mão de obra utilizada:</strong>
                                        @if($rdo_mao_obra->isNotEmpty())
                                            <ul>
                                                @foreach($rdo_mao_obra as $mao_obra)
                                                    <li>{{ $mao_obra->funcao }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>Não há mão de obra assossiada a este RDO.</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Observação:</strong>
                                            <p>{{ $rdo->observacoes ?? 'Nenhuma observação registrada.' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('rdos.index') }}" class="btn btn-secondary">Voltar para a lista</a>
                                    <a href="{{ route('rdos.pdf', $rdo->id) }}" class="btn btn-secondary" target="_blank">Gerar PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection