@extends('layouts.app')

@section('content')

<!-- INICIO MAIN -->
<!-- CONTAINER -->
<main class="container mx-auto p-4 lg:pl-[300px] mt-12 lg:mt-7 lg:max-w-6xl">

    <div class="mt-7 grid grid-cols-1 gap-7 px-3 lg:px-0 w-full mx-auto">

        <div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-full flex flex-col justify-between lg:max-w-3xl mx-auto">


            <!--TEXTO CONTAINER-->
            <section>

                <p class="text-xl text-grey-600 pt-2 text-gray-100 font-semibold">
                    Cadastrar Obra...
                </p>

            </section>

            <!--SECTION FORM-->
            <section class=" mt-10">
                <form class="flex flex-col" method="POST" action="{{ route('rdos.store') }}">
                    @csrf

                    <!--INPUT Número do RDO-->
                    <div class="form-group mb-6 pt-3 rounded bg-input">

                        <label for="numero_rdo" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Número do RDO</label>
                        <input type="text" id="numero_rdo"
                            class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                            name="numero_rdo"
                            required>

                    </div>

                    <!--INPUT DATA -->
                    <div class="form-group row mb-6 pt-3 rounded bg-input">

                        <label for="data" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Data</label>
                        <input type="date" class="form-control
                 bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                            id="data"
                            name="data"
                            required>

                    </div>

                    <!--INPUT DIA DA SEMANA -->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label for="dia_da_semana" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Dia da Semana</label>
                        <input class="form-control
                bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            id="dia_da_semana"
                            name="dia_da_semana"
                            required>

                    </div>

                    <!--INPUT OBRA -->
                    <div class="form-group row mb-6 pt-3 rounded bg-input">

                        <label for="obra_id" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Obra</label>
                        <select class="form-control
                bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            id="obra_id"
                            name="obra_id"
                            required>
                            @foreach($obras as $obra)
                            <option value="{{ $obra->id }}">{{ $obra->objeto_contrato }} - {{ $obra->empresa_contratada }}</option>
                            @endforeach
                        </select>

                    </div>

                    <!--INPUT CONDIÇÃO DO CLIMA -->
                    <div class="form-group row">

                        <div class="mb-6 pt-3 rounded bg-input">

                            <label for="manha" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Condição da Manhã </label>
                            <select class="form-control 
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                                id="manha" name="manha" required>
                                <option value="bom">Bom</option>
                                <option value="chuva-leve">Chuva leve</option>
                                <option value="chuva-forte">Chuva forte</option>
                            </select>

                        </div>

                        <div class="mb-6 pt-3 rounded bg-input">

                            <label for="tarde" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Condição da Tarde</label>
                            <select class="form-control 
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                                id="tarde" name="tarde" required>
                                <option value="bom">Bom</option>
                                <option value="chuva-leve">Chuva leve</option>
                                <option value="chuva-forte">Chuva forte</option>
                            </select>

                        </div>

                        <div class="mb-6 pt-3 rounded bg-input">

                            <label for="noite" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Condição da Noite</label>
                            <select class="form-control 
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                                id="noite" name="noite" required>
                                <option value="bom">Bom</option>
                                <option value="chuva-leve">Chuva leve</option>
                                <option value="chuva-forte">Chuva forte</option>
                            </select>

                        </div>


                    </div>

                    <!--INPUT CONDICAO DA AREA -->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label for="condicao_area" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Condição da Área</label>
                        <select class="form-control 
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            id="condicao_area" name="condicao_area" required>
                            <option value="operavel">Operável</option>
                            <option value="operavel-parcialmente">Operável parcialmente</option>
                            <option value="inoperavel">Inoperável</option>
                        </select>

                    </div>

                    <!--INPUT ACIDENTE -->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label for="acidente" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Acidente</label>
                        <select class="form-control 
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            id="acidente" name="acidente" required>
                            <option value="nao houve">Não houve</option>
                            <option value="sem afastamento">Sem afastamento</option>
                            <option value="com afastamento">Com afastamento</option>
                        </select>

                    </div>

                    <!--INPUT EQUIPAMENTOS UTILIZADOS -->
                    <div class="form-group row mb-6 pt-3 rounded bg-input">
                        <label for="equipamentos" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Equipamentos Utilizados</label>
                        <div class="relative max-h-60 overflow-y-auto scrollbar-hide"> <!-- Added Tailwind classes for scroll -->
                            @foreach($equipamentos as $equipamento)
                            <div class="ml-4 mb-6"> <!-- Increased bottom margin for more spacing -->
                                <div class="flex items-center mb-3"> <!-- Added bottom margin for spacing -->
                                    <input type="checkbox" 
                                        id="equipamento_{{ $equipamento->id }}" 
                                        name="equipamentos[{{ $equipamento->id }}][selected]" 
                                        value="1" 
                                        class="mr-2">
                                    <label for="equipamento_{{ $equipamento->id }}" class="text-white">
                                        {{ $equipamento->nome }} - {{ $equipamento->tipo }}
                                    </label>
                                </div>
                                <div class="flex mt-4"> <!-- Increased top margin for spacing -->
                                    <div class="mr-6"> <!-- Increased right margin for spacing -->
                                        <label for="equipamentos_{{ $equipamento->id }}_manha" class="block text-sm text-txtblue font-bold mb-2">Manhã</label> <!-- Added bottom margin -->
                                        <input type="number" 
                                            name="equipamentos[{{ $equipamento->id }}][manha]" 
                                            id="equipamentos_{{ $equipamento->id }}_manha" 
                                            class="form-control bg-input rounded text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3 w-20" 
                                            placeholder="Qtd" 
                                            min="0">
                                    </div>
                                    <div class="mr-6"> <!-- Increased right margin for spacing -->
                                        <label for="equipamentos_{{ $equipamento->id }}_tarde" class="block text-sm text-txtblue font-bold mb-2">Tarde</label> <!-- Added bottom margin -->
                                        <input type="number" 
                                            name="equipamentos[{{ $equipamento->id }}][tarde]" 
                                            id="equipamentos_{{ $equipamento->id }}_tarde" 
                                            class="form-control bg-input rounded text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3 w-20" 
                                            placeholder="Qtd" 
                                            min="0">
                                    </div>
                                    <div>
                                        <label for="equipamentos_{{ $equipamento->id }}_noite" class="block text-sm text-txtblue font-bold mb-2">Noite</label> <!-- Added bottom margin -->
                                        <input type="number" 
                                            name="equipamentos[{{ $equipamento->id }}][noite]" 
                                            id="equipamentos_{{ $equipamento->id }}_noite" 
                                            class="form-control bg-input rounded text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3 w-20" 
                                            placeholder="Qtd" 
                                            min="0">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                    <!--INPUT MAO DE OBRA DIRETA UTILIZADA -->
                    <div class="form-group row mb-6 pt-3 rounded bg-input">
                        <label for="maoObras" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Mão de Obra Direta Utilizada</label>
                        <div class="relative max-h-60 overflow-y-auto scrollbar-hide"">
                            @foreach($maoObras as $maoObra)
                            <div class="ml-4 mb-6"> <!-- Increased bottom margin for more spacing -->
                                <div class="flex items-center mb-3"> <!-- Added bottom margin for spacing -->
                                    <input type="checkbox" 
                                        id="maoObra_{{ $maoObra->id }}" 
                                        name="maoObras[{{ $maoObra->id }}][selected]" 
                                        value="1" 
                                        class="mr-2">
                                    <label for="maoObra_{{ $maoObra->id }}" class="text-white">
                                        {{ $maoObra->funcao }}
                                    </label>
                                </div>
                                <div class="flex mt-4"> <!-- Increased top margin for spacing -->
                                    <div class="mr-6"> <!-- Increased right margin for spacing -->
                                        <label for="maoObras_{{ $maoObra->id }}_manha" class="block text-sm text-txtblue font-bold mb-2">Manhã</label> <!-- Added bottom margin -->
                                        <input type="number" 
                                            name="maoObras[{{ $maoObra->id }}][manha]" 
                                            id="maoObras_{{ $maoObra->id }}_manha" 
                                            class="form-control bg-input rounded text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3 w-20" 
                                            placeholder="Qtd" 
                                            min="0">
                                    </div>
                                    <div class="mr-6"> <!-- Increased right margin for spacing -->
                                        <label for="maoObras_{{ $maoObra->id }}_tarde" class="block text-sm text-txtblue font-bold mb-2">Tarde</label> <!-- Added bottom margin -->
                                        <input type="number" 
                                            name="maoObras[{{ $maoObra->id }}][tarde]" 
                                            id="maoObras_{{ $maoObra->id }}_tarde" 
                                            class="form-control bg-input rounded text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3 w-20" 
                                            placeholder="Qtd" 
                                            min="0">
                                    </div>
                                    <div>
                                        <label for="maoObras_{{ $maoObra->id }}_noite" class="block text-sm text-txtblue font-bold mb-2">Noite</label> <!-- Added bottom margin -->
                                        <input type="text" 
                                            name="maoObras[{{ $maoObra->id }}][noite]" 
                                            id="maoObras_{{ $maoObra->id }}_noite" 
                                            class="form-control bg-input rounded text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3 w-20" 
                                            placeholder="Qtd">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!--INPUT MAO DE OBRA INDIRETA UTILIZADA -->
                    <div class="form-group row mb-6 pt-3 rounded bg-input">
                        <label for="maoObras" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Mão de Obra Indireta Utilizada</label>
                        <div class="relative max-h-60 overflow-y-auto scrollbar-hide">
                            @foreach($maoObras as $maoObra)
                            <div class="ml-4 mb-6"> <!-- Increased bottom margin for more spacing -->
                                <div class="flex items-center mb-4"> <!-- Added bottom margin for spacing -->
                                    <input type="checkbox" 
                                        id="maoObra_{{ $maoObra->id }}" 
                                        name="maoObras[{{ $maoObra->id }}][selected]" 
                                        value="1" 
                                        class="mr-2">
                                    <label for="maoObra_{{ $maoObra->id }}" class="text-white">
                                        {{ $maoObra->funcao }}
                                    </label>
                                </div>
                                <div class="flex mt-4"> <!-- Increased top margin for spacing -->
                                    <div class="mr-6"> <!-- Increased right margin for spacing -->
                                        <label for="maoObras_{{ $maoObra->id }}_manha" class="block text-sm text-txtblue font-bold mb-2">Manhã</label> <!-- Added bottom margin -->
                                        <input type="number" 
                                            name="maoObras[{{ $maoObra->id }}][manha]" 
                                            id="maoObras_{{ $maoObra->id }}_manha" 
                                            class="form-control bg-input rounded text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3 w-20" 
                                            placeholder="Qtd" 
                                            min="0">
                                    </div>
                                    <div class="mr-6"> <!-- Increased right margin for spacing -->
                                        <label for="maoObras_{{ $maoObra->id }}_tarde" class="block text-sm text-txtblue font-bold mb-2">Tarde</label> <!-- Added bottom margin -->
                                        <input type="number" 
                                            name="maoObras[{{ $maoObra->id }}][tarde]" 
                                            id="maoObras_{{ $maoObra->id }}_tarde" 
                                            class="form-control bg-input rounded text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3 w-20" 
                                            placeholder="Qtd" 
                                            min="0">
                                    </div>
                                    <div>
                                        <label for="maoObras_{{ $maoObra->id }}_noite" class="block text-sm text-txtblue font-bold mb-2">Noite</label> <!-- Added bottom margin -->
                                        <input type="text" 
                                            name="maoObras[{{ $maoObra->id }}][noite]" 
                                            id="maoObras_{{ $maoObra->id }}_noite" 
                                            class="form-control bg-input rounded text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3 w-20" 
                                            placeholder="Qtd">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!--INPUT OBSERVAÇÕES-->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label for="observacoes" class="form-control inline-block text-txtblue text-md font-semibold mb-2 bg-fundo px-3 py-1 rounded-lg">Observações</label>
                        <textarea id="observacoes" class="bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3" id="descricao" name="descricao" rows="5" placeholder="Insira a observação aqui..."></textarea>

                    </div>


                    <!--BOTÃO CADASTRAR-->
                    <button class="btn btn-primary
            bg-txtblue hover:bg-blue-800 text-white font-bold py-2 rounded-lg shadow-lg hover:shadow-xl trasition duration-200"
                        type="submit">
                        Cadastrar
                    </button>

                </form>
            </section>
            <!--FIM SECTION FORM-->

        </div>
    </div>
</main>
<!--FIM CONTAINER-->
<!-- FIM MAIN -->

<script>
    //função que altera o dia da semana de acordo com a data selecionada
    document.getElementById('data').addEventListener('change', function() {
        var dataSelecionada = new Date(this.value); //a variável recebe uma data
        var diaDaSemana = dataSelecionada.getDay(); //a variável recebe um número do método getday()
        var diasSemana = [ //esse número é de acordo com a lista
            'Segunda-feira', //0
            'Terça-feira', //1
            'Quarta-feira', //3
            'Quinta-feira', //4
            'Sexta-feira', //5
            'Sábado', //6
            'Domingo', //7
        ];

        document.getElementById('dia_da_semana').value = diasSemana[diaDaSemana];
    })
</script>
@endsection