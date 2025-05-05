@extends('layouts.app')

@section('content')

    <body class="overflow-hidden">
        <div class="container mx-auto p-4 lg:pl-[300px] mt-10 lg:mt-5 lg:max-w-6xl">
            <div class="mt-4 grid grid-cols-1 gap-7 px-3 lg:px-0 w-full mx-auto">
                <div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-[70px] flex flex-col justify-between lg:max-w-3xl mx-auto">
                    <div class="card shadow-lg rounded">
                        <ul class="overflow-y-auto pr-2 -mr-2 scrollbar-hide max-h-[72vh] sm:max-h-[74vh] space-y-2">

                            <div class="bg-bdinput  text-gray-200 card-header text-center font-bold rounded-md text-lg p-2">
                                <h4>Relatório Diário de Obra - 
                                    {{ \Carbon\Carbon::parse($rdo->data)->format('d/m/Y') }}
                                </h4>
                                <div class="text-center">
                                    <h5 class="text-txtblue text-lg">
                                        RDO {{ $rdo->numero_rdo }}
                                    </h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="flex flex-wrap justify-between -mx-2 px-3 p-4">
                                    <div class="w-full sm:w-1/3 px-2 mb-4">
                                        <strong class="text-txtblue">Status:</strong>
                                        <p class="{{ $rdo->status === 'Pendente' ? 'text-orange-400 font-bold' : ($rdo->status === 'Aprovado' ? 'text-accept font-bold' : 'text-gray-200') }}">{{ $rdo->status }}</p>
                                    </div>
                                    <!-- <div class="w-1/2 sm:w-1/3 px-2 mb-4">
                                        <strong class="text-txtblue">Obra:</strong>
                                        <p class="text-gray-200">{{ $rdo->obras->nome }}</p>
                                    </div>
                                    <div class="w-1/2 sm:w-1/3 px-2 mb-4">
                                        <strong class="text-txtblue">Empresa Contratada:</strong>
                                        <p class="text-gray-200">{{ $rdo->obras->empresa_contratada }}</p>
                                    </div>
                                    <div class="w-full sm:w-1/3 px-2 mb-4">
                                        <strong class="text-txtblue">Objeto do Contrato:</strong>
                                        <p class="text-gray-200">{{ $rdo->obras->objeto_contrato }}</p>
                                    </div> -->
                                </div>

                                <h6 class="text-center font-semibold text-txtblue bg-bdinput rounded-md">
                                    Condição do Tempo
                                </h6>
                                <div class="flex flex-wrap justify-between -mx-2 sm:px-20 px-5 p-4">
                                    @foreach ($rdo->turnos as $turno)
                                        <div class="col-md-4">
                                            <strong class=" text-txtblue">{{ ucfirst($turno->turno->turno ?? '---') }}:</strong>
                                            <p class="text-gray-200">{{ $turno->clima->clima ?? 'Sem clima'}}</p>
                                        </div>
                                    @endforeach
                                    <!-- <div class="col-md-4">
                                        <strong class=" text-txtblue">Tarde:</strong>
                                        <p class="text-gray-200">{{ $rdo->tarde }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <strong class=" text-txtblue">Noite:</strong>
                                        <p class="text-gray-200">{{ $rdo->noite }}</p>
                                    </div> -->
                                </div>

                                <h6 class="text-center font-semibold text-txtblue bg-bdinput rounded-md">
                                    Área
                                </h6>

                                <div class="row flex flex-wrap justify-between sm:px-20 -mx-2 px-5 p-4">
                                    <div class="col-md-6">
                                        <strong class="text-txtblue">Condição da área:</strong>
                                        <p class="text-gray-200">{{ $rdo->condicao_area }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong class=" text-txtblue">Acidente:</strong>
                                        <p class="text-gray-200">{{ $rdo->acidente }}</p>
                                    </div>
                                </div>

                                <h6 class="text-center font-bold text-txtblue bg-bdinput rounded-md">
                                    Equipamentos Utilizados
                                </h6>

                                <div class="flex flex-wrap justify-between -mx-2 sm:px-15 px-5 p-4">
                                    <div class="text-gray-200 col-md-6">
                                        @if($rdo->equipamentos->isNotEmpty())
                                            <ul>
                                                @foreach($rdo->equipamentos as $equipamento)
                                                    <li class="mb-6">
                                                        <div class="font-semibold text-gray-200">{{ $equipamento->nome }}</div>
                                                        <div class="flex mt-4">
                                                            <div class="mr-6">
                                                                <label class="block text-sm text-txtblue font-bold mb-2">Manhã</label>
                                                                <span class="text-gray-200">{{ $equipamento->manha ?? 'N/A' }}</span>
                                                            </div>
                                                            <div class="mr-6">
                                                                <label class="block text-sm text-txtblue font-bold mb-2">Tarde</label>
                                                                <span class="text-gray-200">{{ $equipamento->tarde ?? 'N/A' }}</span>
                                                            </div>
                                                            <div>
                                                                <label class="block text-sm text-txtblue font-bold mb-2">Noite</label>
                                                                <span class="text-gray-200">{{ $equipamento->noite ?? 'N/A' }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-gray-400">Não há equipamentos associados a este RDO.</p>
                                        @endif
                                    </div>
                                </div>

                                <h6 class="text-center font-bold text-txtblue bg-bdinput rounded-md">
                                    Mão de Obra Direta Utilizada
                                </h6>

                                <div class="row flex flex-wrap justify-between -mx-2 sm:px-15 px-5 p-3">
                                    <div class="text-gray-200 col-md-6">
                                        @if($rdo->maoObraDiretas->isNotEmpty())
                                            <ul>
                                                @foreach($rdo->maoObraDiretas as $maoObraDireta)
                                                    <li class="mb-6">
                                                        <div class="font-semibold text-gray-200">
                                                            {{ $maoObraDireta->funcao }}
                                                        </div>
                                                            <!-- <div class="flex mt-4">
                                                                <div class="mr-6">
                                                                    <label class="block text-sm text-txtblue font-bold mb-2">Manhã</label>
                                                                    <span class="text-gray-200">{{ $mao_obra->manha ?? 'N/A' }}</span>
                                                                </div>
                                                                <div class="mr-6">
                                                                    <label class="block text-sm text-txtblue font-bold mb-2">Tarde</label>
                                                                    <span class="text-gray-200">{{ $mao_obra->tarde ?? 'N/A' }}</span>
                                                                </div>
                                                                <div>
                                                                    <label class="block text-sm text-txtblue font-bold mb-2">Noite</label>
                                                                    <span class="text-gray-200">{{ $mao_obra->noite ?? 'N/A' }}</span>
                                                                </div>
                                                            </div> -->
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-gray-400">Não há mão de obra associada a este RDO.</p>
                                        @endif
                                    </div>
                                </div>

                                <h6 class="text-center font-bold text-txtblue bg-bdinput rounded-md">
                                    Mão de Obra Indireta Utilizada
                                </h6>

                                <div class="row flex flex-wrap justify-between -mx-2 sm:px-15 px-5 p-3">
                                    <div class="text-gray-200 col-md-6">
                                        @if($rdo->maoObraIndiretas->isNotEmpty())
                                        <ul>
                                            @foreach($rdo->maoObraIndiretas as $maoObraIndireta)
                                                <li class="mb-6">
                                                    <div class="font-semibold text-gray-200">
                                                        {{ $maoObraIndireta->funcao }}
                                                    </div>
                                                        <!-- <div class="flex mt-4">
                                                            <div class="mr-6">
                                                                <label class="block text-sm text-txtblue font-bold mb-2">Manhã</label>
                                                                <span class="text-gray-200">{{ $mao_obra->manha ?? 'N/A' }}</span>
                                                            </div>
                                                            <div class="mr-6">
                                                                <label class="block text-sm text-txtblue font-bold mb-2">Tarde</label>
                                                                <span class="text-gray-200">{{ $mao_obra->tarde ?? 'N/A' }}</span>
                                                            </div>
                                                            <div>
                                                                <label class="block text-sm text-txtblue font-bold mb-2">Noite</label>
                                                                <span class="text-gray-200">{{ $mao_obra->noite ?? 'N/A' }}</span>
                                                            </div>
                                                        </div> -->
                                                </li>
                                            @endforeach
                                        </ul>
                                        @else
                                        <p class="text-gray-400">Não há mão de obra associada a este RDO.</p>
                                        @endif
                                    </div>
                                </div>

                                <h6 class="text-center font-bold text-txtblue bg-bdinput rounded-md">Observações</h6>

                                <div class="row flex flex-wrap justify-between -mx-2 sm:px-15 px-5 p-3">
                                    <div class="text-gray-200 col-md-6">
                                        <p class="text-gray-400">{{ $rdo->observacoes ?? 'Nenhuma observação registrada.' }}</p>
                                    </div>
                                </div>

                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <div class="mt- fixed bottom-1 left-1/2 transform -translate-x-1/2 lg:left-[calc(298px+40%)] lg:-translate-x-1/2 flex justify-center space-x-2 sm:space-x-5">

        <a href="{{ route('rdos.index') }}"
            class="bg-txtblue/10 border border-txtblue text-txtblue px-3 py-1 rounded-md shadow-lg text-sm font-bold
                flex items-center justify-center space-x-1 whitespace-nowrap
                sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
                overflow-hidden transition-all duration-200
                hover:bg-txtblue hover:text-white">
            <i class="bi bi-arrow-left-circle-fill text-lg sm:text-lg"></i>
            <span class="font-bold hidden sm:inline">Voltar</span>
        </a>

        @if ($rdo->status === "Aprovado")
            <a href="{{ route('rdos.pdf', $rdo->id) }}"
                class="btn btn-sm btn-secondary bg-txtblue/10 border border-txtblue text-txtblue px-3 py-1 rounded-md shadow-lg text-sm font-bold
                    flex items-center justify-center space-x-1 whitespace-nowrap
                    sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
                    overflow-hidden transition-all duration-200
                    hover:bg-txtblue hover:text-white"
                target="_blank">
                <i class="bi bi-file-earmark-pdf-fill text-lg sm:text-lg"></i>
                <span class="font-bold">PDF</span>
            </a>
        @endif

        @can('acoes-gerente')
            @if ($rdo->status === "Aprovado")
                <form action="{{ route('rdos.assinarPdf', $rdo->id) }}" method="POST"
                    class="bg-reject/10 border border-orange-400 text-orange-400 px-3 py-1 rounded-md shadow-lg text-sm font-bold
                        flex items-center justify-center space-x-1 whitespace-nowrap
                        sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
                        overflow-hidden transition-all duration-200
                        hover:bg-orange-400 hover:text-white">
                    @csrf

                    <i class="bi bi-file-earmark-arrow-up-fill text-lg sm:text-lg"></i>
                    <span class="font-bold hidden sm:inline">Enviar para Assinatura</span>
                    <span class="font-bold sm:hidden">Assinatura</span>
                </form>
            @endif

            @if (session('link_assinatura'))
                <div class="alert alert-success mt-3">
                    Documento enviado para assinatura! <br>
                    <a href="{{ session('link_assinatura') }}" target="_blank">Clique aqui para assinar</a>
                </div>
            @endif

            @if ($rdo->status === "Pendente")
                <a href="{{ route('rdos.edit', $rdo) }}"
                    class="bg-edit/10 border border-edit text-edit px-3 py-1 rounded-md shadow-lg text-sm font-bold
                        flex items-center justify-center space-x-1 whitespace-nowrap
                        sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
                        overflow-hidden transition-all duration-200
                        hover:bg-edit hover:text-white">
                    <i class="bi bi-pencil-square text-sm sm:text-lg"></i>
                    <span class="font-bold">Editar</span>
                </a>

                <form action="{{ route('rdos.aprovar', $rdo->id) }}" method="POST"
                    class="bg-accept/10 border border-accept text-accept px-3 py-1 rounded-md shadow-lg text-sm font-bold
                        flex items-center justify-center space-x-1 whitespace-nowrap
                        sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
                        overflow-hidden transition-all duration-200
                        hover:bg-accept hover:text-white">
                    <i class="bi bi-check-circle-fill text-lg sm:text-md"></i>
                    <span class="font-bold hidden sm:inline">Aprovar</span>
                </form>

                <form action="{{ route('rdos.destroy', $rdo) }}" method="POST"
                    class="bg-reject/10 border border-reject text-reject px-3 py-1 rounded-md shadow-lg text-sm font-bold
                        flex items-center justify-center space-x-1 whitespace-nowrap
                        sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
                        overflow-hidden transition-all duration-200
                        hover:bg-reject hover:text-white">
                    @csrf
                    @method('DELETE')
                    <i class="bi bi-x-circle-fill text-lg sm:text-md"></i>
                    <span class="font-bold hidden sm:inline">Rejeitar</span>
                </form>
            @endif
        @endcan

    </div>
@endsection