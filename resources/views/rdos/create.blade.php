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
                        <button type="button" class="block btn btn-sm btn-primary text-md mx-auto
                            bg-txtblue hover:bg-blue-800 text-white font-bold mt-4 py-1 px-2 rounded-lg shadow-lg hover:shadow-xl trasition duration-200" onclick="adicionarTurno()">
                            + Adicionar Turno
                        </button>
                    </div>

                    <!--BOTÃO CADASTRAR-->
                    <button class="btn btn-primary
                            bg-txtblue/10 border border-txtblue text-txtblue px-4 py-2 rounded-lg shadow-lg text-md font-bold whitespace-nowrap
                       flex items-center justify-center
                       sm:px-6 sm:py-2 sm:text-lg
                       overflow-hidden transition-all duration-200
                       hover:bg-txtblue hover:text-white"
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
                    <h5>Turno #${turnoIndex + 1}</h5>
                    <div class="row mb-2">
                        <div class="col">
                            <label class="form-control inline-block text-txtblue text-sm font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Turno</label>
                            <select name="turnos[${turnoIndex}][turno_id]" class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3" required>
                                @foreach ($turnos as $turno)
                                    <option value="{{ $turno->id }}">{{ $turno->turno }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label>Clima</label>
                            <select name="turnos[${turnoIndex}][clima_id]" class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3" required>
                                @foreach ($climas as $clima)
                                    <option value="{{ $clima->id }}">{{ $clima->clima }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label>Condição da Área</label>
                            <select name="turnos[${turnoIndex}][condicao_area]" class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3">
                                <option value="Operável">Operável</option>
                                <option value="Operável parcialmente">Operável parcialmente</option>
                                <option value="Inoperável">Inoperável</option>
                            </select>
                        </div>
                    </div>

                    <h6>Equipamentos</h6>
                    @foreach ($equipamentos as $equipamento)
                        <div class="mb-1">
                            <label>{{ $equipamento->nome }}</label>
                            <input type="number" name="turnos[${turnoIndex}][equipamentos][][equipamento_id]" value="{{ $equipamento->id }}" hidden>
                            <input type="number" name="turnos[${turnoIndex}][equipamentos][][quantidade]" class="form-control" placeholder="Quantidade" min="0">
                        </div>
                    @endforeach

                    <h6>Mão de Obra Direta</h6>
                    @foreach ($maoObraDiretas as $mo)
                        <div class="mb-1">
                            <label>{{ $mo->funcao }}</label>
                            <input type="number" name="turnos[${turnoIndex}][mao_obra_diretas][][mao_obra_direta_id]" value="{{ $mo->id }}" hidden>
                            <input type="number" name="turnos[${turnoIndex}][mao_obra_diretas][][quantidade]" class="form-control" placeholder="Quantidade" min="0">
                        </div>
                    @endforeach

                    <h6>Mão de Obra Indireta</h6>
                    @foreach ($maoObraIndiretas as $mo)
                        <div class="mb-1">
                            <label>{{ $mo->funcao }}</label>
                            <input type="number" name="turnos[${turnoIndex}][mao_obra_indiretas][][mao_obra_indireta_id]" value="{{ $mo->id }}" hidden>
                            <input type="number" name="turnos[${turnoIndex}][mao_obra_indiretas][][quantidade]" class="form-control" placeholder="Quantidade" min="0">
                        </div>
                    @endforeach
                </div>
            `;
        container.insertAdjacentHTML('beforeend', turnoHtml);
        turnoIndex++;
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