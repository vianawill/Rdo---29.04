
@extends('layouts.app')

@section('content')

<!-- Adiciona isso para garantir que o scroll geral não atrapalhe no mobile -->
<body class="overflow-hidden">
    <div class="container mx-auto p-4 lg:pl-[300px] mt-10 lg:mt-7 lg:max-w-6xl">

        <!-- Boas-vindas -->
        <div class="flex items-center justify-center space-x-4">
            <i class="text-3xl bi bi-wrench text-gray-200"></i>
            <h1 class="text-3xl font-bold text-gray-200">Mão de Obra</h1>
        </div>

        <!-- Barra de busca + botão -->
        <div class="mt-6 button-container">
            <div class="flex justify-between items-center px-9 py-2 gap-4 flex-wrap">
                <!-- INPUT PESQUISAR -->
                <div class="flex items-center bg-bdinput p-2.5 rounded-md w-full max-w-full sm:max-w-xl flex-1">
                    <i class="text-gray-100 bi bi-search text-sm"></i>
                    <input id="searchInputtb"
                        class="text-gray-200 text-[15px] ml-4 w-full bg-transparent focus:outline-none"
                        placeholder="Pesquisar"
                        onkeyup="filterTable()" />

                    <script>
                        function normalizeString(str) {
                            return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
                        }

                        function filterTable() {
                            const input = document.getElementById("searchInputtb");
                            const filter = normalizeString(input.value);
                            const table = document.querySelector("table tbody");
                            const rows = table.getElementsByTagName("tr");

                            for (let i = 0; i < rows.length; i++) {
                                const cells = rows[i].getElementsByTagName("td");
                                let match = false;

                                for (let j = 0; j < cells.length; j++) {
                                    const cellText = normalizeString(cells[j].textContent || cells[j].innerText);
                                    if (cellText.indexOf(filter) > -1) {
                                        match = true;
                                        break;
                                    }
                                }

                                rows[i].style.display = match ? "" : "none";
                            }
                        }
                    </script>
                </div>

                <!-- BOTÃO NOVO RDO -->
                <a href="/mao_obras/create"
                class="bg-txtblue/10 border border-txtblue text-txtblue px-4 py-2 rounded-lg shadow-lg text-md font-bold whitespace-nowrap
                       flex items-center justify-center
                       sm:px-6 sm:py-2 sm:text-md
                       w-10 h-10 sm:w-auto sm:h-auto
                       overflow-hidden transition-all duration-200
                       hover:bg-txtblue hover:text-white">
                    <i class="bi bi-plus-circle text-lg sm:mr-2"></i>
                    <span class="hidden sm:inline">Nova Mão de Obra</span>
                </a>
            </div>
        </div>

        <!-- Grid com scroll apenas na lista -->
        <div class="mt-7 grid grid-cols-1 gap-7 px-3 lg:px-0 w-full mx-auto">

<div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-full flex flex-col justify-between lg:max-w-3xl mx-auto">

    <!-- Lista com altura reduzida e scroll próprio -->
    <ul class="overflow-y-auto pr-2 -mr-2 scrollbar-hide max-h-[60vh] space-y-2 flex justify-center items-center">

        <table class="table table-striped text-sm lg:text-lg rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-bdinput text-txtblue rounded-sm">
                    <th class="text-center px-4 py-2">Função</th>
                    @can('acoes-gerente')
                    <th class="px-4 py-2"></th>
                    <th class="px-4 py-2"></th>
                    @endcan
                    
                </tr>
            </thead>
            <tbody class="divide-y divide-bdinput">
                @foreach ($mao_obras as $mao_obra)
                <tr class="hover:bg-gray-700">
                    <td class="text-gray-200 text-center px-4 py-2">{{ $mao_obra->funcao }}</td>      
                    @can('acoes-gerente')              
                    <td class="px-1 py-2">
                        <a href="{{ route('mao_obras.edit', $mao_obra) }}" class="bg-edit/10 border border-edit text-edit px-3 py-1 rounded-md shadow-lg text-sm font-bold
   flex items-center justify-center space-x-1 whitespace-nowrap
   sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
   overflow-hidden transition-all duration-200
   hover:bg-edit hover:text-white">
                            <i class="bi bi-pencil-square text-sm sm:text-md"></i>
                            <span class="font-bold">Editar</span>
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('mao_obras.destroy', $mao_obra) }}" method="POST"
                            class="bg-reject/10 border border-reject text-reject px-3 py-1 rounded-md shadow-lg text-sm font-bold
   flex items-center justify-center space-x-1 whitespace-nowrap
   sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
   overflow-hidden transition-all duration-200
   hover:bg-reject hover:text-white">
                            @csrf
                            @method('DELETE')
                            <i class="bi bi-x-circle-fill text-sm sm:text-md"></i>
                            <span class="font-bold">Excluir</span>
                        </form>
                    </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>

    </ul>


</div>
</div>
</body>
</body>
@endsection
