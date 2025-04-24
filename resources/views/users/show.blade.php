@extends('layouts.app')

@section('content')

<body class="overflow-hidden">


    <div class="container mx-auto p-4 lg:pl-[300px] mt-10 lg:mt-20 lg:max-w-6xl">
        <div class="mt-4 grid grid-cols-1 gap-7 px-3 lg:px-0 w-full mx-auto">
            <div class="bg-input shadow-blue-custom p-6 rounded-lg w-full h-full flex flex-col justify-between lg:max-w-3xl mx-auto">
                <div class="card shadow-lg rounded">
                    <ul class="overflow-y-auto pr-2 -mr-2 scrollbar-hide max-h-[72vh] sm:max-h-[74vh] space-y-2">

                        <div class="bg-bdinput  text-gray-200 card-header text-center font-bold rounded-md text-lg p-2">
                           

                            <div class="text-center">
                                <h5 class="text-txtblue text-lg">
                                     {{ $user->name }}
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="flex flex-wrap justify-between -mx-2 px-4 p-4">
                                <div class="w-1/2 sm:w-1/3 px-2 mb-4">
                                    <strong class="text-txtblue">Nome:</strong>
                                    <p class="text-gray-200">{{ $user->name }}</p>
                                </div>
                                <div class="w-1/2 sm:w-1/3 px-1 mb-4">
                                    <strong class="text-txtblue">CPF:</strong>
                                    <p class="text-gray-200">{{ $user->cpf }}</p>
                                </div>
                                <div class="w-full sm:w-1/3 px-2">
                                    <strong class="text-txtblue">Email:</strong>
                                    <p class="text-gray-200">{{ $user->email  }}</p>
                                </div>
                                <div class="w-full sm:w-1/3 px-2 mt-4">
                                    <strong class=" text-txtblue">Nivel de acesso:</strong>
                                    <p class="text-gray-200">{{ $user->access_level }}</p>
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
</body>

<div class="mt- fixed bottom-8 left-1/2 transform -translate-x-1/2 lg:left-[calc(298px+40%)] lg:-translate-x-1/2 flex justify-center space-x-2 sm:space-x-5">

    <a href="{{ route('users.index') }}"
        class="bg-txtblue/10 border border-txtblue text-txtblue px-3 py-1 rounded-md shadow-lg text-sm font-bold
               flex items-center justify-center space-x-1 whitespace-nowrap
               sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
               overflow-hidden transition-all duration-200
               hover:bg-txtblue hover:text-white">
        <i class="bi bi-arrow-left-circle-fill text-lg sm:text-lg"></i>
        <span class="font-bold sm:inline">Voltar</span>
    </a>

        @can('acoes-gerente')
        <a href="{{ route('users.edit', $user) }}"
            class="bg-edit/10 border border-edit text-edit px-3 py-1 rounded-md shadow-lg text-sm font-bold
               flex items-center justify-center space-x-1 whitespace-nowrap
               sm:px-4 sm:py-2 sm:rounded-lg sm:text-md
               overflow-hidden transition-all duration-200
               hover:bg-edit hover:text-white">
            <i class="bi bi-pencil-square text-sm sm:text-lg"></i>
            <span class="font-bold">Editar</span>
        </a>

        

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
        
        @endcan
    

</div>
@endsection