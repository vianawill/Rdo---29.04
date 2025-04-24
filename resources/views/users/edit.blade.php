@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4 lg:pl-[300px] mt-10 lg:mt-20 lg:max-w-6xl">
    <div class="mt-4 grid grid-cols-1 gap-7 px-3 lg:px-0 w-full mx-auto">
        <div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-full flex flex-col justify-between lg:max-w-3xl mx-auto">
            <div class="card shadow-lg rounded">
                <form action="{{ route('users.update', $user) }}" method="POST">

                    <ul class="overflow-y-auto pr-2 -mr-2 scrollbar-hide max-h-[72vh] sm:max-h-[74vh] space-y-2">
                        
                        <div class="card-body">


                            @csrf
                            @method('PUT')

                            <div class="flex flex-wrap justify-between -mx-2 px-4 p-4">
                                <div class="w-1/2 sm:w-1/3 px-2 mb-4">
                                    <label class=" text-txtblue text-sm font-bold mb-2 ml-3" for="name">Nome</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="text"
                                        name="name"
                                        value="{{ $user->name }}"
                                        required>
                                </div>
                                <div class="w-1/2 sm:w-1/3 px-1 mb-4">
                                    <label class=" text-txtblue text-sm font-bold mb-2 ml-3" for="cpf">CPF</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="text"
                                        name="cpf"
                                        value="{{ $user->cpf }}"
                                        required>
                                </div>
                                <div class="w-full sm:w-1/3 px-2">
                                    <label class=" text-txtblue text-sm font-bold mb-2 ml-3" for="email">Email</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="email"
                                        name="email"
                                        value="{{ $user->email }}"
                                        required>
                                </div>
                                <div class="w-full sm:w-full px-2">
                                    <label class=" text-txtblue text-sm font-bold mb-2 ml-3" for="password">Senha</label>
                                    <input class=" bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                                        type="password"
                                        name="password">
                                    <p class="ml-2 text-gray-400">deixe em branco para manter a mesma senha</p></input>
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

<div class="mt-6 fixed  left-1/2 transform -translate-x-1/2 lg:left-[calc(298px+40%)] lg:-translate-x-1/2 flex justify-center space-x-2 sm:space-x-5">
    <a href="{{ route('users.index') }}"
        class="bg-txtblue/10 border border-txtblue text-txtblue px-3 py-1 rounded-md shadow-lg text-lg font-bold
               flex items-center justify-center space-x-1 whitespace-nowrap
               sm:px-4 sm:py-2 sm:rounded-lg sm:text-lg
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