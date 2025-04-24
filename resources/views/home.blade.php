@extends('layouts.app')

@auth

<body>

  <div class="container mx-auto p-4 lg:pl-[300px] mt-10 lg:mt-7 lg:max-w-6xl">

    <!-- Boas-vindas -->
    <h1 class="text-3xl font-bold text-center text-gray-200">Olá,
      <span class="font-bold text-txtblue">{{ Auth::user()->name }}!</span>
    </h1>
    <p class="text-gray-300 text-center">Aqui está um resumo das suas atividades recentes.</p>

    <!-- Grid dos cards -->
    <div class="grid grid-cols-1 gap-7 mt-7 px-3 lg:px-0 w-full mx-auto">

      <!-- Notificações -->
      <div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-[220px] flex flex-col justify-between lg:max-w-3xl mx-auto">
        <h2 class="text-gray-100 text-lg font-bold mb-2">
          <i class="text-lg bi bi-bell-fill"></i> Notificações
        </h2>
        <ul class="space-y-2 overflow-y-auto flex-grow">
          <li class="relative p-2 border-txtblue border bg-bdinput rounded flex justify-between">
            <div class="absolute top-0 left-0 w-4 h-4 bg-red-600 rounded" style="clip-path: polygon(0 0, 100% 0, 0 100%);"></div>
            <span class="text-gray-200">RDO #12345 precisa de aprovação!</span>
            <button class="bg-txtblue text-white px-3 py-1 rounded text-sm">Ver</button>
          </li>
          <li class="p-2 border-txtblue bg-bdinput border rounded flex justify-between">
            <span class="text-gray-200">Equipamento novo cadastrado.</span>
            <button class="bg-txtblue text-white px-3 py-1 rounded text-sm">Ver</button>
          </li>
        </ul>
      </div>

      <!-- Últimos RDOs -->
      <div class="bg-input shadow-blue-custom p-6  rounded-lg w-full h-[260px] lg:max-w-3xl mx-auto">
        <h2 class="text-gray-100 text-lg font-bold mb-2">
          <i class="text-lg bi bi-file-earmark-text-fill"></i> Últimos RDO's
        </h2>
        <ul class=" space-y-2">

                <table class="table lg:ml-3 text-sm lg:text-md">
                        
                        <tbody class="divide-y divide-bdinput">
                            @foreach ($rdos as $rdo)
                            <tr class="hover:bg-gray-700">
                                <td class="text-gray-200 text-center px-4 py-2 hidden lg:table-cell">{{ $rdo->numero_rdo }}</td>
                                <td class="text-gray-200 text-center px-4 py-2">{{ \Carbon\Carbon::parse($rdo->data)->format('d/m/Y') }}</td>
                                <td class="text-gray-200 text-center px-4 py-2 ">{{ $rdo->obras->nome }}</td> <!-- Esconde no mobile -->
                                <td class="text-gray-200 text-center px-4 py-2 hidden lg:table-cell">{{ $rdo->obras->empresa_contratada }}</td>
                                <td class="text-gray-200 text-center px-4 py-2 ">{{ $rdo->obras->objeto_contrato }}</td> <!-- Esconde no mobile -->
                                <td class="text-center px-4 py-2">
                                    <a href="{{ route('rdos.show', $rdo) }}"
                                        class="text-txtblue text-4xl hover:text-white transition-all duration-200">
                                        <i class="bi bi-arrow-up-right-circle"></i>
                                    </a>
                                    @can('editar-deletar')
                                    <a href="{{ route('rdos.edit', $rdo) }}" class="btn btn-warning px-4 py-2">Editar</a>
                                    <form action="{{ route('rdos.destroy', $rdo) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger px-4 py-2">Excluir</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </ul>
      </div>

    </div>

    <!-- Botão fixo -->
    <div class="mt-5 fixed bottom-6 lg:bottom-10 left-1/2 transform -translate-x-1/2 lg:left-[calc(298px+40%)] lg:-translate-x-1/2 flex justify-center">
      <a href="/rdos/create"
        class="bg-txtblue text-white px-4 py-2 rounded-full shadow-lg text-md font-bold
                       flex items-center justify-center space-x-1
                       overflow-hidden transition-all duration-200">
        <i class="bi bi-plus-circle text-lg sm:mr-2"></i>
        <span class="font-bold">Novo RDO</span>
      </a>
    </div>

  </div>
</body>
@endauth