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
                    Cadastrar Equipamento...
                </p>

            </section>

            <!--SECTION FORM-->
            <section class=" mt-10">
                <form class="flex flex-col" method="POST" action="{{ route('equipamentos.store') }}">
                    @csrf

                    <!--INPUT NOME DO EQUIPAMENTO -->
                    <div class="form-group mb-6 pt-3 rounded bg-input">

                        <label class="form-control block text-txtblue text-sm font-bold mb-2 ml-3">Nome do Equipamento</label>
                        <input type="text" id="nome"
                            class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                            name="nome"
                            required>

                    </div>

                    <!--INPUT TIPO DE EQUIPAMENTO-->
                    <div class="form-group row mb-6 pt-3 rounded bg-input">

                        <label class="form-control block text-txtblue text-sm font-bold mb-2 ml-3">Tipo de Equipamento</label>
                        <input type="text" id="tipo" class="form-control
                         bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                            name="tipo"
                            required>

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

@endsection