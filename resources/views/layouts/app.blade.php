<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- INICIO HEAD -->
@auth

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<!-- FIM HEAD -->
<header>
    <nav class="fixed text-2xl top-5 px-1 right-4 z-50 flex items-center space-x-3 lg:hidden">

        <!-- Notificações -->
        <div class="relative">
            <i class="bi bi-bell-fill text-gray-200"></i>
            <i class="bi bi-exclamation-circle-fill absolute text-base text-red-600 -top-1 -right-1"></i>
        </div>

        <!-- Perfil -->
        <div class="relative group">
            <i class="bi bi-person-circle px-1 text-gray-200 "></i>
            <div class="absolute left-1/2 transform -translate-x-1/2 mt-1 bg-gray-800 text-white text-sm px-3 py-1 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                {{ Auth::user()->name }}
            </div>
        </div>

    </nav>
</header>
<!-- INICIO BODY -->

<body class="bg-fundo  font-[Poppins]">
    @csrf
    <main>@yield('content')</main>
    <!-- BOTAO OPEN SIDEBAR -->
    <span class="fixed text-white text-3xl top-5 left-4 cursor-pointer rounded-2xl" onclick="Openbar()">
        <i class="bi bi-filter-left px-1 bg-gray-900 rounded-2xl"></i>
    </span>

    <!-- SIDEBAR -->
    <div id="sidebar" class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-600 ease-in-out
    p-4 w-[300px] overflow-y-auto text-center bg-fundo shadow-xl h-screen border-r-2 border-bdinput transform
    scrollbar-hide">

        <!-- DIV SIDEBAR -->
        <div class=" text-gray-100 text-xl">

            <!-- HEADER SIDEBAR -->
            <div class="header-sidebar p-2.5  flex items-center rounded-md ">

                <!-- LOGO AlfaID -->
                <a href="{{ route('home') }}">
                    <img class="ml-2 w-20 h-19"
                        src="/img/navbar/Vector.png" alt="logo-alfaid">
                </a>

                <!-- BOTAO CLOSE SIDEBAR -->
                <i class="bi bi-x-lg ml-auto cursor-pointer lg:hidden hover:bg-red-600 rounded" onclick="Openbar()"></i>

            </div>
            <!-- FIM HEADER SIDEBAR -->

            <!-- DIVISORIA -->
            <hr class="my-2 text-gray-700">

            <!-- CONTAINER SIDEBAR -->
            <div class="button-container">

                <!-- INPUT PESQUISAR -->
                <div class="p-2.5 mt-3 flex items-center rounded-md 
                            px-4 duration-300 cursor-pointer bg-bdinput">

                    <!-- ICONE -->
                    <i class="bi bi-search text-sm"></i>

                    <input id="searchInput" class="text-[15px] ml-4 w-full bg-transparent focus:outline-none"
                        placeholder="Pesquisar" />

                </div>

                <!-- RDO´s -->
                <div class=" sidebar-item p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-txtblue">

                    <!-- ICONE -->
                    <i class="bi bi-file-earmark-text-fill"></i>

                    <div class="flex justify-between w-full items-center" onclick="dropDown()">

                        <span class="text-[15px] ml-4 text-gray-200">RDO's</span>

                        <!-- BOTAO SUBMENU -->
                        <span class="text-sm transition-transform duration-300 rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>

                    </div>

                </div>

                <!-- SUBMENU -->
                <div class="leading-7 text-sm mt-2 w-4/5 mx-auto" id="submenu">

                    <!-- SUBMENU MINHAS RDO's -->
                    <a href="{{ route('rdos.index') }}" class="sidebar-item">
                        <div class="flex items-center p-2.5 mt-2 rounded-md px-4 duration-300 cursor-pointer hover:bg-txtblue">
                            <!-- ÍCONE -->
                            <i class="bi bi-file-earmark-check text-lg mr-2"></i>
                            <span>Meus RDO's</span>
                        </div>
                    </a>

                    <!-- SUBMENU GERAR RDO -->
                    <a href="{{ route('rdos.create') }}" class="sidebar-item">

                        <div class="flex items-center p-2.5 mt-2 rounded-md px-4 duration-300 cursor-pointer hover:bg-txtblue">
                            <!-- ÍCONE -->
                            <i class="bi bi-file-earmark-plus text-lg mr-2"></i>
                            <span>Gerar RDO</span>
                        </div>
                    </a>
                </div>

                <!-- OBRAS -->
                <a href="{{ route('obras.index') }}" class="sidebar-item">
                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-txtblue">
                        <!-- ICONE -->
                        <i class="bi bi-cone-striped"></i>
                        <span class="text-[15px] ml-4 text-gray-200">
                            Obras
                        </span>
                    </div>
                </a>

                <!-- EQUIPAMENTOS -->
                <a href="{{ route('equipamentos.index') }}" class="sidebar-item">
                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-txtblue">
                        <!-- ICONE -->
                        <i class="bi bi-tools"></i>
                        <span class="text-[15px] ml-4 text-gray-200">
                            Equipamentos
                        </span>
                    </div>
                </a>

                <!-- Mão de Obra -->
                <div class=" sidebar-item p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-txtblue">
                    <!-- ICONE -->
                    <i class="bi bi-people-fill"></i>
                    <div class="flex justify-between w-full items-center" onclick="dropDown()">
                        <span class="text-[15px] ml-4 text-gray-200">Mão de Obra</span>
                        <!-- BOTAO SUBMENU -->
                        <span class="text-sm transition-transform duration-300 rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>

                <!-- SUBMENU -->
                <div class="leading-7 text-sm mt-2 w-4/5 mx-auto" id="submenu">
                    <!-- SUBMENU Mão de Obra Direta -->
                    <a href="{{ route('mao_obra_diretas.index') }}" class="sidebar-item">
                        <div class="flex items-center p-2.5 mt-2 rounded-md px-4 duration-300 cursor-pointer hover:bg-txtblue">
                            <!-- ÍCONE -->
                            <i class="bi bi-person-gear text-lg mr-2"></i>
                            <span> Mão de Obra Direta</span>
                        </div>
                    </a>

                    <!-- SUBMENU Mão de Obra Indireta -->
                    <a href="{{ route('mao_obra_indiretas.index') }}" class="sidebar-item">
                        <div class="flex items-center p-2.5 mt-2 rounded-md px-4 duration-300 cursor-pointer hover:bg-txtblue">
                            <!-- ÍCONE -->
                            <i class="bi bi-person-gear text-lg mr-2"></i>
                            <span> Mão de Obra Indireta</span>
                        </div>
                    </a>
                </div>

                <!-- TURNOS -->
                <a href="{{ route('turnos.index') }}" class="sidebar-item">
                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-txtblue">
                        <!-- ICONE -->
                        <i class="bi bi-sun-fill"></i>
                        <i class="bi bi-moon-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200">
                            Turnos
                        </span>
                    </div>
                </a>

                <!-- DIVISORIA  -->
                <hr class="my-4 text-gray-600">

                <!-- NOTIFICAÇÕES -->
                <a href="" class="sidebar-item">
                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-txtblue">
                        <!-- ICONE -->
                        <div class="relative">
                            <i class="bi bi-bell-fill"></i>
                            <i class="bi bi-exclamation-circle-fill absolute text-sm text-red-600 -top-1 -right-1"></i>
                        </div>
                        <span class="text-[15px] ml-4 text-gray-200">
                            Notificações
                        </span>
                    </div>
                </a>

                <!-- USUÁRIOS -->
                <a href="{{ route('users.index') }}" class="sidebar-item">
                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-txtblue">
                        <!-- ICONE -->
                        <i class="bi bi-people-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200">
                            Usuários
                        </span>
                    </div>
                </a>

                <!-- NOME DO USUARIO -->
                <div class="absolute bottom-20 left-0 w-full p-4">
                    <label class="perfil-label text-sm text-gray-200">
                        <span class="font-bold text-txtblue">
                            {{ Auth::user()->name }}
                        </span>
                    </label>

                    <!-- LOGOUT -->
                    <a href="{{ route('logout') }}">
                        <div class="w-40 mx-auto p-1 mt-2 flex items-center justify-center rounded-2xl px-4 duration-300 cursor-pointer hover:bg-red-500"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <!-- ICONE -->
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span class="text-[12px] ml-4 text-gray-200">
                                Logout
                            </span>
                        </div>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>

            </div>
            <!-- FIM CONTAINER SIDEBAR -->

        </div>
        <!-- FIM DIV SIDEBAR -->

    </div>
    <!-- FIM SIDEBAR -->

</body>
<!-- FIM BODY -->
@endauth


<!-- SCRIPT -->
<script>
    // FUNÇÃO PARA ABRIR SUB MENU DO SIDEBAR
    function dropDown(event) {
        const parent = event.currentTarget.closest('.sidebar-item');
        const submenu = parent.nextElementSibling;
        const arrow = parent.querySelector('#arrow');

        if (submenu && submenu.id === 'submenu') {
            submenu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        }
    }

    document.querySelectorAll('.sidebar-item > div').forEach(item => {
        const submenu = item.closest('.sidebar-item').nextElementSibling;
        const arrow = item.querySelector('#arrow');

        if (submenu && submenu.id === 'submenu') {
            submenu.classList.add('hidden'); // Ensure submenus are initially hidden
            arrow.classList.remove('rotate-180'); // Ensure arrows are in the default position
        }

        item.addEventListener('click', dropDown);
    });

    // FUNÇÃO PARA ABRIR E FECHAR O SIDEBAR
    function Openbar() {
        document.querySelector('.sidebar').classList.toggle('left-[-300px]')
    }

    // FUNCAO PARA A BARRA DE PESQUISA
    document.getElementById("searchInput").addEventListener("input", function() {

        let filter = this.value.toLowerCase(); // Obtém o valor digitado e transforma em minúsculas

        let items = document.querySelectorAll(".sidebar-item"); // Seleciona todos os itens do menu

        items.forEach(item => {

            let text = item.textContent.toLowerCase(); // Obtém o texto do item

            if (text.includes(filter)) {
                item.style.display = ""; // Mostra o item se houver correspondência

            } else {
                item.style.display = "none"; // Esconde o item se não houver correspondência
            }
        });
    });
</script>
<!-- FIM SCRIPT -->

</html>