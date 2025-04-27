@extends('layouts.app')

@section('content')


<div class="container mx-auto p-4 lg:pl-[300px] mt-10 lg:mt-10 lg:max-w-6xl">
    <div class="mt-4 grid grid-cols-1 gap-7 px-3 lg:px-0 w-full mx-auto">
        <div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-full flex flex-col lg:max-w-3xl mx-auto">
            <div class="card shadow-lg rounded">

                <form action="{{ route('obras.update', $obra) }}" method="POST">
                    <ul class="overflow-y-auto pr-2 -mr-2 scrollbar-hide max-h-[72vh] sm:max-h-[74vh] space-y-2">

                        <div class="card-body">

                            @csrf
                            @method('PUT')

                            <div class="flex flex-wrap  -mx-2 px-4 p-4">
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-sm font-bold mb-2 ml-3" for="nome">Nome da Obra:</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="text"
                                        id="nome"
                                        name="nome"
                                        value="{{ $obra->nome }}"
                                        required>
                                </div>
                                <div class="w-full px-1 mb-4">
                                    <label class=" text-txtblue text-sm font-bold mb-2 ml-3" for="empresa_contratada">Empresa Contratada:</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="text"
                                        name="empresa_contratada"
                                        id="empresa_contratada"
                                        value="{{ $obra->empresa_contratada }}"
                                        required>
                                </div>
                                <div class="w-full px-2">
                                    <label class=" text-txtblue text-sm font-bold mb-2 ml-3" for="objeto_contrato">Objeto do Contrato:</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="text"
                                        id="objeto_contrato"
                                        name="objeto_contrato"
                                        value="{{ $obra->objeto_contrato }}"
                                        required>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2 px-4 p-4">
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-xs font-bold mb-2 ml-3" for="tempo_total_contrato">Tempo Total do Contrato:</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="text"
                                        name="tempo_total_contrato"
                                        id="tempo_total_contrato"
                                        value="{{ $obra->tempo_total_contrato }}"
                                        required>
                                </div>
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-xs font-bold mb-2 ml-3" for="data_prevista_inicio_obra">Data Prevista de Início:</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="date"
                                        name="data_prevista_inicio_obra"
                                        id="data_prevista_inicio_obra"
                                        value="{{ $obra->data_prevista_inicio_obra }}"
                                        required>
                                </div>
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-xs font-bold mb-2 ml-3" for="data_real_inicio_obra">Data Real de Início:</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="date"
                                        name="data_real_inicio_obra"
                                        id="data_real_inicio_obra"
                                        value="{{ $obra->data_real_inicio_obra }}"
                                        required>
                                </div>
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-xs font-bold mb-2 ml-3" for="data_prevista_termino_obra">Data Prevista de Término:</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="date"
                                        name="data_prevista_termino_obra"
                                         id="data_prevista_termino_obra"
                                        value="{{ $obra->data_prevista_termino_obra }}"
                                        required>
                                </div>
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-xs font-bold mb-2 ml-3" for="data_real_termino_obra">Data Real de Término:</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="date"
                                        name="data_real_termino_obra"
                                        id="data_real_termino_obra"
                                        value="{{ $obra->data_real_termino_obra }}"
                                        >
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2 px-4 p-4">
                                <div class="w-full px-2 mb-4">
                                    <label class=" text-txtblue text-sm font-bold mb-2 ml-3" for="descricao">Descrição:</label>
                                    <textarea  class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        id="descricao"
                                        name="descricao"
                                        value="{{ $obra->descricao }}"
                                        placeholder="Insira a descrição aqui">
                                    </textarea>
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

    <a href="{{ route('obras.index') }}"
        class="bg-txtblue/10 border border-txtblue text-txtblue px-3 py-1 rounded-md shadow-lg text-sm font-bold
               flex items-center justify-center space-x-1 whitespace-nowrap
               sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
               overflow-hidden transition-all duration-200
               hover:bg-txtblue hover:text-white">
        <i class="bi bi-arrow-left-circle-fill text-lg sm:text-lg"></i>
        <span class="font-bold sm:inline">Voltar</span>
    </a>

    <button class="bg-edit/10 border border-edit text-edit px-3 py-1 rounded-md shadow-lg text-lg font-bold
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