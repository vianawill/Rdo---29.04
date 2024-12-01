@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded">
                    <div class="card-header text-center">
                        <h4>Relatório Diário de Obra - RDO {{ $rdo->numero_rdo }} - {{ $rdo->data }}</h4>
                    </div>
                    <div class="card-header text-center">
                        <h5>Relatório Diário de Obra - RDO</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Obra:</strong>
                                <p>{{ $rdo->obras->nome }}</p>
                            </div>
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
                                <div class="col-md-12">
                                    <strong>Condição da área:</strong>
                                    <p>{{ $rdo->condicao_area }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Acidente:</strong>
                                    <p>{{ $rdo->acidente }}</p>
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
                                <!-- Se precisar de mais dados, pode continuar aqui -->

                                <div class="mt-4">
                                    <a href="{{ route('rdos.index') }}" class="btn btn-secondary">Voltar para a lista</a>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection