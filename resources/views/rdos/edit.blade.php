@extends('layouts.app')

@section('content')


<div class="container mx-auto p-4 lg:pl-[300px] mt-10 lg:mt-10 lg:max-w-6xl">
    <div class="mt-4 grid grid-cols-1 gap-7 px-3 lg:px-0 w-full mx-auto">
        <div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-full flex flex-col lg:max-w-3xl mx-auto">
            <div class="card shadow-lg rounded">

                <form action="{{ route('rdos.update', $rdo) }}" method="POST">

                    <ul class="overflow-y-auto pr-2 -mr-2 scrollbar-hide max-h-[72vh] sm:max-h-[72vh] space-y-2">
                        <div class="card-body">

                            @csrf
                            @method('PUT')

                            <div class="flex flex-wrap -mx-2 px-4 p-4">
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="numero_rdo">Número do RDO:</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="text"
                                        name="numero_rdo"
                                        id="numero_rdo"
                                        value="{{ $rdo->numero_rdo }}"
                                        required>
                                </div>
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="data">Data:</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="date"
                                        name="data"
                                        id="data"
                                        value="{{ $rdo->data }}"
                                        required>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2 px-4 p-4">
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="obra_id">Obra:</label>
                                    <select class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        name="obra_id"
                                        id="obra_id"
                                        value="{{ $rdo->obra_id }}"
                                        required>
                                        @foreach($obras as $obra)
                                        <option value="{{ $obra->id }}">{{ $obra->objeto_contrato }} - {{ $obra->empresa_contratada }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2 px-4 p-4">
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="manha">Manhã</label>
                                    <select class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        name="manha"
                                        id="manha"
                                        value="{{ $rdo->manha }}"
                                        required>
                                        <option value="bom">Bom</option>
                                        <option value="chuva leve">Chuva leve</option>
                                        <option value="chuva forte">Chuva forte</option>
                                    </select>
                                </div>
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="tarde">Tarde:</label>
                                    <select class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        id="tarde"
                                        name="tarde"
                                        value="{{ $rdo->tarde }}"
                                        required>
                                        <option value="bom">Bom</option>
                                        <option value="chuva leve">Chuva leve</option>
                                        <option value="chuva forte">Chuva forte</option>
                                    </select>
                                </div>
                                <div class="w-full px-2">
                                    <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="noite">Noite:</label>
                                    <select class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        id="noite"
                                        name="noite"
                                        value="{{ $rdo->noite }}"
                                        required>
                                        <option value="bom">Bom</option>
                                        <option value="chuva leve">Chuva leve</option>
                                        <option value="chuva forte">Chuva forte</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2 px-4 p-4">
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="condicao_area">Condição da área:</label>
                                    <select class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        id="condicao_area"
                                        name="condicao_area"
                                        value="{{ $rdo->condicao_area }}"
                                        required>
                                        <option value="operavel">Operável</option>
                                        <option value="operavel parcialmente">Operável parcialmente</option>
                                        <option value="inoperavel">Inoperável</option>
                                    </select>
                                </div>
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="acidente">Acidente:</label>
                                    <select class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        id="acidente"
                                        name="acidente"
                                        value="{{ $rdo->acidente }}"
                                        required>
                                        <option value="nao houve">Não houve</option>
                                        <option value="sem afastamento">Sem afastamento</option>
                                        <option value="com afastamento">Com afastamento</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2 px-4 p-4">
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="equipamentos">Equipamentos utilizados:</label>
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

                            </div>

                            <div class="flex flex-wrap -mx-2 px-4 p-4">
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="equipamentos">Mão de Obra Direta:</label>
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

                                <div class="flex flex-wrap -mx-2 px-4 p-4">
                                    <div class="w-full px-2 mb-4">
                                        <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="equipamentos">Mão de Obra Indireta:</label>
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

                                    <div class="flex flex-wrap -mx-2 px-4 p-4">
                                        <div class="w-full px-2 mb-4">
                                            <label class=" text-txtblue text-lg font-bold mb-2 ml-3" for="observacoes">Observações:</label>
                                            <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                                type="text"
                                                name="observacoes"
                                                value="{{ $rdo->observacoes }}"
                                                required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </ul>
            </div>
        </div>
    </div>
</div>
</div>

<div class=" fixed bottom-1 left-1/2 transform -translate-x-1/2 lg:left-[calc(298px+40%)] lg:-translate-x-1/2 flex justify-center space-x-2 sm:space-x-5">

    <a href="{{ route('rdos.index') }}"
        class="bg-txtblue/10 border border-txtblue text-txtblue px-3 py-1 rounded-md shadow-lg text-sm font-bold
               flex items-center justify-center space-x-1 whitespace-nowrap
               sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
               overflow-hidden transition-all duration-200
               hover:bg-txtblue hover:text-white">
        <i class="bi bi-arrow-left-circle-fill text-lg sm:text-lg"></i>
        <span class="font-bold sm:inline">Voltar</span>
    </a>

    <button class="btn btn-primary bg-edit/10 border border-edit text-edit px-3 py-1 rounded-md shadow-lg text-lg font-bold
               flex items-center justify-center space-x-1 whitespace-nowrap
               sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
               overflow-hidden transition-all duration-200
               hover:bg-edit hover:text-white"
        type="submit">
        Atualizar
    </button>
    </form>

</div>
@endsection