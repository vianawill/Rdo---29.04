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
                <form class="flex flex-col" method="POST" action="{{ route('obras.store') }}">
                    @csrf

                    <!--INPUT NOME DA OBRA-->
                    <div class="form-group mb-6 pt-3 rounded bg-input">

                        <label class="form-control block text-txtblue text-sm font-bold mb-2 ml-3">Nome da Obra</label>
                        <input type="text" id="nome"
                            class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                            name="nome"
                            required>

                    </div>

                    <!--INPUT EMPRESA CONTRATADA-->
                    <div class="form-group row mb-6 pt-3 rounded bg-input">

                        <label class="form-control block text-txtblue text-sm font-bold mb-2 ml-3">Empresa Contratada</label>
                        <input type="text" id="cpf" class="form-control
                 bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                            id="empresa_contratada"
                            name="empresa_contratada"
                            required>

                    </div>

                    <!--INPUT OBJETO DO CONTRATO -->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label class="form-control block text-txtblue text-sm font-bold mb-2 ml-3">Objeto do Contrato</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror
                bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            id="objeto_contrato"
                            name="objeto_contrato"
                            required>

                    </div>

                    <!--INPUT TEMPO TOTAL DO CONTRATO -->
                    <div class="form-group row mb-6 pt-3 rounded bg-input">

                        <label class="block text-txtblue text-sm font-bold mb-2 ml-3">Tempo Total do Contrato</label>
                        <input type="text" class="form-control 
                bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            id="tempo_total_contrato"
                            name="tempo_total_contrato"
                            required>

                    </div>

                    <!--INPUT DATA PREVISTA DE TÉRMINO -->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label class="block text-txtblue text-sm font-bold mb-2 ml-3">Data Prevista de Início</label>
                        <input class="form-control 
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            type="date"
                            id="data_prevista_inicio_obra"
                            name="data_prevista_inicio_obra"
                            required>

                    </div>

                    <!--INPUT DATA REAL DE INICIO -->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label class="block text-txtblue text-sm font-bold mb-2 ml-3">Data Real de Início</label>
                        <input class="form-control 
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            type="date"
                            id="data_real_inicio_obra"
                            name="data_real_inicio_obra"
                            required>

                    </div>

                    <!--INPUT DATA PREVISTA DE TÉRMINO -->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label class="block text-txtblue text-sm font-bold mb-2 ml-3">Data Prevista de Término</label>
                        <input class="form-control 
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            type="date"
                            id="data_prevista_termino_obra"
                            name="data_prevista_termino_obra"
                            required>

                    </div>

                    <!--INPUT DATA REAL DE TÉRMINO -->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label class="block text-txtblue text-sm font-bold mb-2 ml-3">Data Real de Término</label>
                        <input class="form-control 
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            type="date"
                            id="data_real_termino_obra"
                            name="data_real_termino_obra"
                            required>

                    </div>

                    <!--INPUT DATA REAL DE TÉRMINO -->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label class="block text-txtblue text-sm font-bold mb-2 ml-3">Data Real de Término</label>
                        <input class="form-control 
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                            type="date"
                            id="data_real_termino_obra"
                            name="data_real_termino_obra"
                            required>

                    </div>

                    <!--INPUT DESCRIÇÃO-->
                    <div class="mb-6 pt-3 rounded bg-input">

                        <label class="block text-txtblue text-sm font-bold mb-2 ml-3">Descrição</label>
                        <textarea class="bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3" id="descricao" name="descricao" rows="5" placeholder="Insira a descrição aqui..."></textarea>

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


@endsection