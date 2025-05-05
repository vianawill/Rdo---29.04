@extends('layouts.app')

@section('content')
    <main class="container mx-auto p-4 lg:pl-[300px] mt-12 lg:mt-7 lg:max-w-6xl">
        <div class="mt-7 grid grid-cols-1 gap-7 px-3 lg:px-0 w-full mx-auto">
            <div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-full flex flex-col justify-between lg:max-w-3xl mx-auto">
                <!--TEXTO CONTAINER-->
                <section>
                    <p class="text-xl text-grey-600 pt-2 text-gray-100 font-semibold">
                        Cadastrar RDO
                    </p>
                </section>

                <!--SECTION FORM-->
                <section class=" mt-10">
                    <form class="flex flex-col" method="POST" action="{{ route('rdos.store') }}">
                        @csrf

                        <!-- INPUT DATA E DIA DA SEMANA -->
                        <div class="flex flex-col lg:flex-row gap-4 justify-between items-center">
                            <!-- INPUT DATA -->
                            <div class="form-group mb-6 pt-3 rounded bg-input w-full lg:w-1/2">
                                <label for="data"
                                    class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">
                                    Data
                                </label>
                                <input type="date"
                                    class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-txtblue transition duration-500 px-3 pb-3"
                                    id="data" name="data" required>
                            </div>

                            <!-- INPUT DIA DA SEMANA -->
                            <div class="form-group mb-6 pt-3 rounded bg-input w-full lg:w-1/2">
                                <label for="dia_da_semana"
                                    class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">
                                    Dia da Semana
                                </label>
                                <input
                                    class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                                    id="dia_da_semana" name="dia_da_semana" required>
                            </div>
                        </div>

                        <!--INPUT OBRA -->
                        <div class="form-group row mb-6 pt-3 rounded bg-input">
                            <label for="obra_id" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">
                                Obra
                            </label>
                            <select class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                                id="obra_id" name="obra_id" required>
                                @foreach($obras as $obra)
                                    <option value="{{ $obra->id }}">{{ $obra->objeto_contrato }} - {{ $obra->empresa_contratada }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!--TURNOS -->
                        <div class="form-group row mb-6 pt-3 rounded bg-input">
                            <label for="turno_id" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">
                                Turnos
                            </label>
                            <div id="turnos-container"></div>
                            <button type="button" class="block btn btn-sm btn-primary text-md mx-auto bg-txtblue/10 border border-txtblue text-txtblue font-bold mt-4 py-1 px-2 rounded-lg shadow-lg hover:shadow-xl trasition hover:bg-txtblue hover:text-white" 
                                onclick="adicionarTurno()">
                                + Adicionar Turno
                            </button>
                        </div>

                        <!--BOTÃO CADASTRAR-->
                        <button class="btn btn-primary bg-accept/10 border border-accept text-accept px-4 py-2 rounded-lg shadow-lg text-md font-bold whitespace-nowrap flex items-center justify-center sm:px-6 sm:py-2 sm:text-lg overflow-hidden transition-all duration-200 hover:bg-accept hover:text-white"
                            type="submit">
                            Cadastrar RDO
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </main>

    <script>
        let turnoIndex = 0;

        function adicionarTurno() {
            const container = document.getElementById('turnos-container');
            const turnoHtml = `
                    <div class="border border-bdinput p-2 rounded-lg w-full h-full flex flex-col justify-between lg:max-w-3xl mx-auto shadow-2xl">
                        <h5 class="text-gray-200 text-xs mt-2 mb-2">Turno #${turnoIndex + 1}</h5>
                        <div class="row mb-2">
                            <div class="col mt-2 mb-2">
                                <label class="form-control inline-block text-txtblue text-sm font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Turno</label>
                                <select name="turnos[${turnoIndex}][turno_id]" class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3" required>
                                    @foreach ($turnos as $turno)
                                        <option value="{{ $turno->id }}">{{ $turno->turno }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mt-2 mb-2">
                                <label class="form-control inline-block text-txtblue text-sm font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Clima</label>
                                <select name="turnos[${turnoIndex}][clima_id]" class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3" required>
                                    @foreach ($climas as $clima)
                                        <option value="{{ $clima->id }}">{{ $clima->clima }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mt-2 mb-2">
                                <label class="form-control inline-block text-txtblue text-sm font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Condição da Área</label>
                                <select name="turnos[${turnoIndex}][condicao_area]" class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3">
                                    <option value="Operável">Operável</option>
                                    <option value="Operável parcialmente">Operável parcialmente</option>
                                    <option value="Inoperável">Inoperável</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-6 pt-3 rounded bg-input">

                                <label for="acidente" class="form-control inline-block text-txtblue text-sm font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Acidente</label>
                                <select class="form-control 
                                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                                    id="acidente" name="acidente" required>
                                    <option value="nao houve">Não houve</option>
                                    <option value="sem afastamento">Sem afastamento</option>
                                    <option value="com afastamento">Com afastamento</option>
                                </select>

                            </div>

                        <!-- Equipamentos -->
                        <h6 class="form-control inline-block text-txtblue text-sm font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Equipamentos</h6>
                        <button type="button" onclick="abrirModalEquipamento(${turnoIndex})" class="block btn btn-sm btn-primary text-sm mx-auto
                                bg-txtblue text-white font-bold mt-4 py-1 px-2 rounded-lg shadow-lg hover:shadow-xl trasition 
                        ">Adicionar Equipamento</button>

                        <!-- Modal de Equipamentos -->
                        <div id="modal-equipamento-${turnoIndex}" class="hidden inset-0 z-50 flex items-center justify-center">
                            <div onclick="fecharModalEquipamento(${turnoIndex})" class="absolute inset-0 bg-black opacity-60"></div>
                            <div class="relative bg-white rounded-lg p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto z-10 shadow-lg">
                                <h2 class="text-xl font-bold text-gray-800 mb-4">Adicionar Equipamentos</h2>
                                <div class="mb-4">
                                    <input type="text" id="pesquisa-equipamento-${turnoIndex}" class="w-full p-2 border border-gray-300 rounded" placeholder="Pesquisar Equipamentos..." oninput="filtrarEquipamentos(${turnoIndex})">
                                </div>
                                <div id="equipamentos-lista-${turnoIndex}" class="max-h-80 overflow-y-auto space-y-3">
                                    @foreach ($equipamentos as $equipamento)
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" name="turnos[${turnoIndex}][equipamentos][][equipamento_id]" value="{{ $equipamento->id }}" class="equipamento-checkbox-${turnoIndex}"> 
                                            <label class="text-sm text-gray-700">{{ $equipamento->nome }}</label>
                                            <input type="number" name="turnos[${turnoIndex}][equipamentos][][quantidade]" class="w-20 border border-gray-300 rounded px-3 py-1 mt-1" placeholder="Quantidade" min="0">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="flex justify-end space-x-3 mt-6">
                                    <button onclick="fecharModalEquipamento(${turnoIndex})" class="bg-gray-400 text-blue px-4 py-2 rounded hover:bg-gray-500">Cancelar</button>
                                    <button onclick="fecharModalEquipamento(${turnoIndex})" class="bg-blue-600 text-blue px-4 py-2 rounded hover:bg-blue-700">Salvar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Mão de Obra Direta -->
                        <h6 class="form-control inline-block text-txtblue text-sm font-semibold mb-2 mt-2 bg-fundo px-3 py-1 rounded-lg">Mão de Obra Direta</h6>
                        <button type="button" onclick="abrirModalMaoObraDireta(${turnoIndex})" class="block btn btn-sm btn-primary text-sm mx-auto
                                bg-txtblue text-white font-bold mt-4 py-1 px-2 rounded-lg shadow-lg hover:shadow-xl trasition 
                        hover:bg-txtblue hover:text-white">Adicionar Mão de Obra Direta</button>
                        <div id="modal-mao-obra-direta-${turnoIndex}" class="hidden inset-0 z-50 flex items-center justify-center">
                            <div onclick="fecharModalMaoObraDireta(${turnoIndex})" class="absolute inset-0 bg-black opacity-60"></div>
                            <div class="relative bg-white rounded-lg p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto z-10 shadow-lg">
                                <h2 class="text-xl font-bold text-gray-800 mb-4">Adicionar Mão de Obra Direta</h2>
                                <div class="mb-4">
                                    <input type="text" id="pesquisa-mao-obra-direta-${turnoIndex}" class="w-full p-2 border border-gray-300 rounded" placeholder="Pesquisar Mão de Obra Direta..." oninput="filtrarMaoObraDireta(${turnoIndex})">
                                </div>
                                <div id="mao-obra-direta-lista-${turnoIndex}" class="max-h-80 overflow-y-auto space-y-3">
                                    @foreach ($maoObraDiretas as $mo)
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" name="turnos[${turnoIndex}][mao_obra_diretas][][mao_obra_direta_id]" value="{{ $mo->id }}" class="mao-obra-direta-checkbox-${turnoIndex}"> 
                                            <label class="text-sm text-gray-700">{{ $mo->funcao }}</label>
                                            <input type="number" name="turnos[${turnoIndex}][mao_obra_diretas][][quantidade]" class="w-20 border border-gray-300 rounded px-3 py-1 mt-1" placeholder="Quantidade" min="0">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="flex justify-end space-x-3 mt-6">
                                    <button onclick="fecharModalMaoObraDireta(${turnoIndex})" class="bg-gray-400 text-blue px-4 py-2 rounded hover:bg-gray-500">Cancelar</button>
                                    <button onclick="fecharModalMaoObraDireta(${turnoIndex})" class="bg-blue-600 text-blue px-4 py-2 rounded hover:bg-blue-700">Salvar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Mão de Obra Indireta -->
                        <h6 class="form-control inline-block text-txtblue text-sm font-semibold mb-2 mt-2 bg-fundo px-3 py-1 rounded-lg">Mão de Obra Indireta</h6>
                        <button type="button" onclick="abrirModalMaoObraIndireta(${turnoIndex})" class="block btn btn-sm btn-primary text-sm mx-auto
                                bg-txtblue text-white font-bold mt-4 py-1 px-2 rounded-lg shadow-lg hover:shadow-xl trasition 
                        hover:bg-txtblue hover:text-white">Adicionar Mão de Obra Indireta</button>
                        <div id="modal-mao-obra-indireta-${turnoIndex}" class="hidden inset-0 z-50 flex items-center justify-center">
                            <div onclick="fecharModalMaoObraIndireta(${turnoIndex})" class="absolute inset-0 bg-black opacity-60"></div>
                            <div class="relative bg-white rounded-lg p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto z-10 shadow-lg">
                                <h2 class="text-xl font-bold text-gray-800 mb-4">Adicionar Mão de Obra Indireta</h2>
                                <div class="mb-4">
                                    <input type="text" id="pesquisa-mao-obra-indireta-${turnoIndex}" class="w-full p-2 border border-gray-300 rounded" placeholder="Pesquisar Mão de Obra Indireta..." oninput="filtrarMaoObraIndireta(${turnoIndex})">
                                </div>
                                <div id="mao-obra-indireta-lista-${turnoIndex}" class="max-h-80 overflow-y-auto space-y-3">
                                    @foreach ($maoObraIndiretas as $mo)
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" name="turnos[${turnoIndex}][mao_obra_indiretas][][mao_obra_indireta_id]" value="{{ $mo->id }}" class="mao-obra-indireta-checkbox-${turnoIndex}"> 
                                            <label class="text-sm text-gray-700">{{ $mo->funcao }}</label>
                                            <input type="number" name="turnos[${turnoIndex}][mao_obra_indiretas][][quantidade]" class="w-20 border border-gray-300 rounded px-3 py-1 mt-1" placeholder="Quantidade" min="0">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="flex justify-end space-x-3 mt-6">
                                    <button onclick="fecharModalMaoObraIndireta(${turnoIndex})" class="bg-gray-400 text-blue px-4 py-2 rounded hover:bg-gray-500">Cancelar</button>
                                    <button onclick="fecharModalMaoObraIndireta(${turnoIndex})" class="bg-blue-600 text-blue px-4 py-2 rounded hover:bg-blue-700">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            container.insertAdjacentHTML('beforeend', turnoHtml);
            turnoIndex++;
        }

        function abrirModalEquipamento(turnoIndex) {
            document.getElementById(`modal-equipamento-${turnoIndex}`).classList.remove('hidden');
        }

        function fecharModalEquipamento(turnoIndex) {
            document.getElementById(`modal-equipamento-${turnoIndex}`).classList.add('hidden');
        }

        function filtrarEquipamentos(turnoIndex) {
            let searchValue = document.getElementById(`pesquisa-equipamento-${turnoIndex}`).value.toLowerCase();
            let equipamentos = document.querySelectorAll(`#equipamentos-lista-${turnoIndex} .flex`);
            equipamentos.forEach(equipamento => {
                let label = equipamento.querySelector('label').innerText.toLowerCase();
                if (label.indexOf(searchValue) === -1) {
                    equipamento.classList.add('hidden');
                } else {
                    equipamento.classList.remove('hidden');
                }
            });
        }

        function abrirModalMaoObraDireta(turnoIndex) {
            document.getElementById(`modal-mao-obra-direta-${turnoIndex}`).classList.remove('hidden');
        }

        function fecharModalMaoObraDireta(turnoIndex) {
            document.getElementById(`modal-mao-obra-direta-${turnoIndex}`).classList.add('hidden');
        }

        function filtrarMaoObraDireta(turnoIndex) {
            let searchValue = document.getElementById(`pesquisa-mao-obra-direta-${turnoIndex}`).value.toLowerCase();
            let maoObra = document.querySelectorAll(`#mao-obra-direta-lista-${turnoIndex} .flex`);
            maoObra.forEach(item => {
                let label = item.querySelector('label').innerText.toLowerCase();
                if (label.indexOf(searchValue) === -1) {
                    item.classList.add('hidden');
                } else {
                    item.classList.remove('hidden');
                }
            });
        }

        function abrirModalMaoObraIndireta(turnoIndex) {
            document.getElementById(`modal-mao-obra-indireta-${turnoIndex}`).classList.remove('hidden');
        }

        function fecharModalMaoObraIndireta(turnoIndex) {
            document.getElementById(`modal-mao-obra-indireta-${turnoIndex}`).classList.add('hidden');
        }

        function filtrarMaoObraIndireta(turnoIndex) {
            let searchValue = document.getElementById(`pesquisa-mao-obra-indireta-${turnoIndex}`).value.toLowerCase();
            let maoObra = document.querySelectorAll(`#mao-obra-indireta-lista-${turnoIndex} .flex`);
            maoObra.forEach(item => {
                let label = item.querySelector('label').innerText.toLowerCase();
                if (label.indexOf(searchValue) === -1) {
                    item.classList.add('hidden');
                } else {
                    item.classList.remove('hidden');
                }
            });
        }
    </script>

    <script>
        //função que altera o dia da semana de acordo com a data selecionada
        document.getElementById('data').addEventListener('change', function() {
            var dataSelecionada = new Date(this.value); //a variável recebe uma data
            var diaDaSemana = dataSelecionada.getDay(); //a variável recebe um número do método getday()
            var diasSemana = [ //esse número é de acordo com a lista
                'Segunda-feira', // 0
                'Terça-feira', // 1
                'Quarta-feira', // 2
                'Quinta-feira', // 3
                'Sexta-feira', // 4
                'Sábado', // 5
                'Domingo', // 6
            ];

            document.getElementById('dia_da_semana').value = diasSemana[diaDaSemana];
        })
    </script>
@endsection