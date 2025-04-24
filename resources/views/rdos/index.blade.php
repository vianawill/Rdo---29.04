@extends('layouts.app')

@section('content')

<!-- Adiciona isso para garantir que o scroll geral não atrapalhe no mobile -->

<body class="overflow-hidden">
    <div class="container mx-auto p-4 lg:pl-[300px] mt-10 lg:mt-7 lg:max-w-6xl">

        <!-- Boas-vindas -->
        <div class="flex items-center justify-center space-x-3">
            <i class="text-3xl bi bi-file-earmark-text-fill text-gray-200"></i>
            <h1 class="text-3xl font-bold text-gray-200">RDO's</h1>
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
                        onkeyup="filterTable()">

                    <script>
                        function normalizeText(text) {
                            return text.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
                        }

                        function filterTable() {
                            const input = document.getElementById('searchInputtb');
                            const filter = normalizeText(input.value);
                            const table = document.querySelector('.table tbody');
                            const rows = table.getElementsByTagName('tr');

                            for (let i = 0; i < rows.length; i++) {
                                const cells = rows[i].getElementsByTagName('td');
                                let match = false;

                                for (let j = 0; j < cells.length; j++) {
                                    if (cells[j]) {
                                        const textValue = normalizeText(cells[j].textContent || cells[j].innerText);
                                        if (textValue.indexOf(filter) > -1) {
                                            match = true;
                                            break;
                                        }
                                    }
                                }

                                rows[i].style.display = match ? '' : 'none';
                            }
                        }

                      
                    </script>
                </div>
                
                <!-- BOTÃO PENDENTES -->
                @can('acoes-gerente')
                <button onclick="toggleFilter(this)"
                    class="bg-txtblue/10 border border-orange-400 text-orange-400 px-4 py-2 rounded-lg shadow-lg text-md font-bold whitespace-nowrap
                       flex items-center justify-center
                       sm:px-6 sm:py-2 sm:text-lg
                       overflow-hidden transition-all duration-200
                       hover:bg-orange-400 hover:text-white">
                    <span>Pendentes</span>
                </button>

                <script>
                    function toggleFilter(button) {
                        const table = document.querySelector('.table tbody');
                        const rows = table.getElementsByTagName('tr');
                        const isShowingPending = button.textContent.trim().toLowerCase() === 'pendentes';

                        for (let i = 0; i < rows.length; i++) {
                            const statusCell = rows[i].querySelector('td:nth-child(6)'); // Assuming the status column is the 6th column
                            if (statusCell) {
                                const statusText = statusCell.textContent || statusCell.innerText;
                                if (isShowingPending) {
                                    rows[i].style.display = statusText.trim().toLowerCase() === 'pendente' ? '' : 'none';
                                } else {
                                    rows[i].style.display = '';
                                }
                            }
                        }

                        if (isShowingPending) {
                            button.textContent = 'Voltar';
                            button.classList.remove('border-orange-400', 'text-orange-400', 'hover:bg-orange-400');
                            button.classList.add('border-txtblue', 'text-txtblue', 'hover:bg-txtblue');
                        } else {
                            button.textContent = 'Pendentes';
                            button.classList.remove('border-txtblue', 'text-txtblue', 'hover:bg-txtblue');
                            button.classList.add('border-orange-400', 'text-orange-400', 'hover:bg-orange-400');
                        }
                    }
                </script>
                @endcan

                <!-- BOTÃO NOVO RDO -->
                <a href="/rdos/create"
                    class="bg-txtblue/10 border border-txtblue text-txtblue px-4 py-2 rounded-lg shadow-lg text-md font-bold whitespace-nowrap
                       flex items-center justify-center
                       sm:px-6 sm:py-2 sm:text-md
                       w-10 h-10 sm:w-auto sm:h-auto
                       overflow-hidden transition-all duration-200
                       hover:bg-txtblue hover:text-white">
                    <i class="bi bi-plus-circle text-lg sm:mr-2"></i>
                    <span class="hidden sm:inline">Novo RDO</span>
                </a>

            </div>
        </div>

        <!-- Grid com scroll apenas na lista -->
        <div class="mt-7 grid grid-cols-1 gap-7 px-3 lg:px-0 w-full mx-auto">

            <div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-full flex flex-col justify-between lg:max-w-3xl mx-auto">

                <!-- Lista com altura reduzida e scroll próprio -->
                <ul class="overflow-y-auto pr-2 -mr-2 scrollbar-hide max-h-[60vh] space-y-2">

                <table class="table table-striped text-sm lg:text-md rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-bdinput text-txtblue rounded-sm">
                                <th class="text-center px-4 py-2 hidden lg:table-cell">RDO</th>
                                <th class="text-center px-4 py-2">Data</th>
                                <th class="text-center px-4 py-2">Obra</th> <!-- Esconde no mobile -->
                                <th class="text-center px-4 py-2 hidden lg:table-cell">Empresa Contratada</th>
                                <th class="text-center px-4 py-2 ">Objeto do Contrato</th> <!-- Esconde no mobile -->
                                <th class="text-center px-4 py-2 hidden lg:table-cell">Status</th> <!-- Esconde no mobile -->
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-bdinput">
                            @foreach ($rdos as $rdo)
                            <tr class="hover:bg-gray-700">
                                <td class="text-gray-200 text-center px-4 py-2 hidden lg:table-cell">{{ $rdo->numero_rdo }}</td>
                                <td class="text-gray-200 text-center px-4 py-2">{{ \Carbon\Carbon::parse($rdo->data)->format('d/m/Y') }}</td>
                                <td class="text-gray-200 text-center px-4 py-2 ">{{ $rdo->obras->nome }}</td> <!-- Esconde no mobile -->
                                <td class="text-gray-200 text-center px-4 py-2 hidden lg:table-cell">{{ $rdo->obras->empresa_contratada }}</td>
                                <td class="text-gray-200 text-center px-4 py-2 ">{{ $rdo->obras->objeto_contrato }}</td> <!-- Esconde no mobile -->
                                <td class="text-gray-200 text-center px-4 py-2 hidden lg:table-cell">{{ $rdo->status }}</td> <!-- Esconde no mobile -->
                                <td class="text-center px-4 py-2">
                                    <a href="{{ route('rdos.show', $rdo) }}"
                                        class="text-txtblue text-4xl hover:text-white transition-all duration-200">
                                        <i class="bi bi-arrow-up-right-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </ul>


            </div>
        </div>
</body>
@endsection