@extends('layouts.app')

@auth

<body>
<div class="container mx-auto p-4 lg:pl-[300px] mt-8 lg:mt-4 lg:max-w-6xl">

        <!-- Boas-vindas -->
        <h1 class="text-xl lg:text-3xl font-bold text-center text-gray-200">Olá,
            <span class="font-bold text-txtblue">{{ Auth::user()->name }}!</span>
        </h1>
        <p class="text-gray-300 text-sm text-center">Aqui está um resumo das suas atividades recentes.</p>

        <!-- Grid dos cards -->
        <div class="grid grid-cols-1 gap-7 mt-7 px-3 lg:px-0 w-full mx-auto">

            <!-- Notificações -->
            <div class="bg-input shadow-blue-custom p-4 rounded-lg w-full h-[240px] lg:max-w-3xl mx-auto">
                <h2 class="text-gray-100 text-lg font-bold mb-2">
                    <i class="text-lg bi bi-file-earmark-text-fill"></i> RDOs Pendentes
                </h2>
                <ul class="space-y-2">
                    <table class="table lg:ml-3 text-xs lg:text-lg">
                        <tbody class="divide-y divide-bdinput">
                            @forelse ($rdosPendentes as $rdo)
                                @php
                                    $url= route('rdos.show', $rdo);
                                @endphp
                                <tr class="hover:bg-gray-700 cursor-pointer">
                                    <td class=" text-gray-200 text-center px-4 py-2 hidden lg:table-cell">{{ $rdo->numero_rdo }}</td>
                                    <td class="text-gray-200 text-center px-4 py-2">{{ \Carbon\Carbon::parse($rdo->data)->format('d/m/Y') }}</td>
                                    <td class="text-gray-200 text-center px-4 py-2">{{ $rdo->obras->nome ?? 'Obra não encontrada'}}</td>
                                    <td class="text-gray-200 text-center px-4 py-2 hidden lg:table-cell">{{ $rdo->obras->empresa_contratada ?? 'Obra não encontrada' }}</td>
                                    <td class="text-gray-200 text-center px-4 py-2">{{ $rdo->obras->objeto_contrato ?? 'Obra não encontrada' }}</td>

                                    <td class="text-center px-4 py-2 hidden lg:table-cell">
                                        <a href="{{ route('rdos.show', $rdo) }}"
                                            class="text-txtblue text-4xl hover:text-white transition-all duration-200">
                                            <i class="bi bi-arrow-up-right-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-gray-200">Nenhum RDO pendente encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </ul>
            </div>

            <!-- Últimos RDOs -->
            <div class="bg-input shadow-blue-custom p-4 rounded-lg w-full h-[265px] lg:max-w-3xl mx-auto">
                <h2 class="text-gray-100 text-lg font-bold mb-2">
                    <i class="text-lg bi bi-file-earmark-text-fill"></i> Últimos RDOs
                </h2>
                <ul class="space-y-2">
                    <table class="table lg:ml-3 text-xs lg:text-lg">
                        <tbody class="divide-y divide-bdinput">
                            @forelse ($rdosAprovados as $rdo)
                                @php
                                    $url= route('rdos.show', $rdo);
                                @endphp
                                <tr class="hover:bg-gray-700 cursor-pointer">
                                    <td class="text-gray-200 text-center px-4 py-2 hidden lg:table-cell">{{ $rdo->numero_rdo }}</td>
                                    <td class="text-gray-200 text-center px-4 py-2">{{ \Carbon\Carbon::parse($rdo->data)->format('d/m/Y') }}</td>
                                    <td class="text-gray-200 text-center px-4 py-2">{{ $rdo->obras->nome ?? 'Obra não encontrada' }}</td>
                                    <td class="text-gray-200 text-center px-4 py-2 hidden lg:table-cell">{{ $rdo->obras->empresa_contratada ?? 'Obra não encontrada' }}</td>
                                    <td class="text-gray-200 text-center px-4 py-2">{{ $rdo->obras->objeto_contrato ?? 'Obra não encontrada' }}</td>
                                    <td class="text-center px-4 py-2 hidden lg:table-cell">
                                        <a href="{{ route('rdos.show', $rdo) }}"
                                            class="text-txtblue text-4xl hover:text-white transition-all duration-200">
                                            <i class="bi bi-arrow-up-right-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-gray-200">Nenhum RDO aprovado encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </ul>
            </div>

        </div>

        <!-- Botão fixo -->
        <div class="fixed bottom-8 lg:bottom-10 left-1/2 transform -translate-x-1/2 lg:left-[calc(298px+40%)] lg:-translate-x-1/2 flex justify-center">
            <a href="/rdos/create" class="bg-txtblue text-white px-4 py-2 rounded-full shadow-lg text-md font-bold flex items-center justify-center space-x-1 overflow-hidden transition-all duration-200">
                <i class="bi bi-plus-circle text-lg sm:mr-2"></i>
                <span class="font-bold">Novo RDO</span>
            </a>
        </div>

        

    </div>
</body>
@endauth