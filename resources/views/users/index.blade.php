@extends('layouts.app')

@section('content')

<!-- Adiciona isso para garantir que o scroll geral não atrapalhe no mobile -->

<body class="overflow-hidden">
    <div class="container mx-auto p-4 lg:pl-[300px] mt-10 lg:mt-7 lg:max-w-6xl">

        <!-- Boas-vindas -->
        <div class="flex items-center justify-center space-x-4">
            <i class="text-3xl bi bi-people-fill text-gray-200"></i>
            <h1 class="text-3xl font-bold text-gray-200">Usuários</h1>
        </div>


        <!-- Barra de busca + botão -->
        <div class="mt-6 button-container">
            <div class="flex justify-between items-center px-9 py-2 gap-4 flex-wrap">
                <!-- INPUT PESQUISAR -->
                <div class="flex items-center bg-bdinput p-2.5 rounded-md w-full max-w-full sm:max-w-3xl flex-1">
                    <i class="text-gray-100 bi bi-search text-sm"></i>
                    <input id="searchInputtb"
                        class="text-gray-200 text-[15px] ml-4 w-full bg-transparent focus:outline-none"
                        placeholder="Pesquisar"
                        onkeyup="filterTable()" />

                    <script>
                        function normalizeString(str) {
                            return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
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
                                    if (cellText.includes(filter)) {
                                        match = true;
                                        break;
                                    }
                                }

                                rows[i].style.display = match ? "" : "none";
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        
        <!-- Grid com scroll apenas na lista -->
        <div class="mt-7 grid grid-cols-1 gap-7 px-3 lg:px-0 w-full mx-auto">

            <div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-full flex flex-col justify-between lg:max-w-3xl mx-auto">

                <!-- Lista com altura reduzida e scroll próprio -->
                <ul class="overflow-y-auto pr-2 -mr-2 scrollbar-hide max-h-[60vh] space-y-2">

                    <table class="table table-striped text-md lg:text-lg rounded-lg overflow-hidden {{ auth()->user()->tipo === 'gerente' ? 'lg:text-sm' : '' }}">
                        <thead>
                            <tr class="bg-bdinput text-txtblue rounded-sm">
                                <th class="text-center px-1 py-2">Nome</th>
                                <th class="text-center px-1 py-2">CPF</th>
                                <th class="text-center px-1 py-2 hidden lg:table-cell">Email</th>
                                <th class="text-center px-1 py-2">Acesso</th>
                                <th class="px-4 py-2 lg:hidden""></th>
                                @can('acoes-gerente')
                                <th class="px-4 py-2 hidden lg:table-cell"></th>
                                <th class="px-4 py-2 hidden lg:table-cell"></th>
                                @endcan
                                
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-bdinput">
                            @foreach ($users as $user)
                            <tr class="hover:bg-gray-700">
                                <td class="text-gray-200 text-center px-1 py-2">{{ $user->name }}</td>
                                <td class="text-gray-200 text-center px-1 py-2">{{ $user->cpf }}</td>
                                <td class="text-gray-200 text-center px-1 py-2 hidden lg:table-cell">{{ $user->email }}</td>
                                <td class="text-gray-200 text-center px-1 py-2">{{ $user->tipo }}</td>
                                <td class="text-center px-4 py-2 lg:hidden"">
                                    <a href="{{ route('users.show', $user) }}"
                                        class="text-txtblue text-4xl hover:text-white transition-all duration-200">
                                        <i class="bi bi-arrow-up-right-circle"></i>
                                    </a>
                                </td>

                                @can('acoes-gerente')
                                <td class="px-1 py-2 hidden lg:table-cell"">
                                    <a href="{{ route('users.edit', $user) }}" class="bg-edit/10 border border-edit text-edit px-3 py-1 rounded-md shadow-lg text-sm font-bold
               flex items-center justify-center space-x-1 whitespace-nowrap
               sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
               overflow-hidden transition-all duration-200
               hover:bg-edit hover:text-white">
                                        <i class="bi bi-pencil-square text-sm sm:text-md"></i>
                                        <span class="font-bold">Editar</span>
                                    </a>
                                </td>

                                <!-- can -->
                                <td class="hidden lg:table-cell">
                                    <form action="{{ route('users.destroy', $user) }}" method="POST"
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
@endsection