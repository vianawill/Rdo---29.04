<!-- INICIO HEAD -->

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800;900&display=swap" rel="stylesheet">
</head>
<!-- FIM HEAD -->

<!-- COR DO FUNDO APLICADA DIRETAMENTE NO CSS-->
<style>
    .body-bg {
        background-color: #151A30;
    }
</style>

<!-- INICIO BODY -->

<body class="body-bg pt-9 lg:pt-6 pb-1 px-2 md:px-0 overflow-hidden">

    <!-- INICIO HEADER -->
    <header class=" container max-w-lg mx-auto">

        <!-- LOGO AlfaID -->
        <img class=" mx-auto lg:w-21 lg:h-19 sm:w-18 sm:h-16"
            src="/img/navbar/Vector.png" alt="logo-alfaid">

        <!-- TITULO -->
        <h1 class=" mt-6 mb-0 sm:text-xl lg:text-2xl font-bold text-white text-center ">
            Registro Diario de Obra
        </h1>

    </header>
    <!-- FIM HEADER -->

    <!-- INICIO MAIN -->
    <!-- CONTAINER -->
    <main class="bg-secundario w-11/12 max-w-sm mx-auto p-6 md:w-full md:max-w-lg md:p-6 my-8 rounded-lg shadow-2xl ">

        <!--TEXTO CONTAINER-->
        <section>
            <h3 class="font-bold text-2xl text-gray-100">Bem Vindo!</h3>
            <p class=" text-grey-600 pt-2 text-gray-100"">Entre com seu cadastro...</p>
        </section>

        <!--SECTION FORM-->
        <section class=" mt-10">
            <form class="flex flex-col" method="POST" action="{{ route('login') }}">
                @csrf

                <!--INPUT CPF-->
                <div class="mb-6 pt-3 rounded bg-input">

                    <label class="block text-txtblue text-sm font-bold mb-2 ml-3" for="cpf">CPF</label>
                    <input type="text" id="cpf" class="form-control @error('cpf') is-invalid @enderror
                     bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                        name="cpf"
                        maxlength="11"
                        value="{{ old('cpf') }}"
                        required
                        autocomplete="cpf"
                        autofocus>


                    <!--ERROR INPUT CPF-->
                    @error('cpf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <!--INPUT SENHA-->
                <div class="mb-6 pt-3 rounded bg-input">

                    <label class="block text-txtblue text-sm font-bold mb-2 ml-3" for="password">Senha</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password">

                    <!--ERROR INPUT SENHA-->
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <!--ESQUECEU A SENHA-->
                
                <div class="flex justify-end">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="btn btn-link text-sm text-txtblue hover:text-blue-800 hover:underline mb-6">
                        Esqueceu sua senha?
                    </a>
                    @endif
                </div>

                <!--BOTÃO LOGIN-->
                <button class="btn btn-primary
                bg-txtblue hover:bg-blue-800 text-white font-bold py-2 rounded-lg shadow-lg hover:shadow-xl trasition duration-200"
                    type="submit">
                    {{ __('Login') }}
                </button>

            
        </section>
        </form><!--FIM SECTION FORM-->

    </main>
    <!--FIM CONTAINER-->
    <!-- FIM MAIN -->

    <!-- LINK CADASTRE-SE -->
    <div class="max-w-lg mx-auto text-center mt-8 mb-4">
        <p class="text-xs text-gray-400 ">Não tem uma conta? <a href="{{ route('register') }}" class="text-txtblue hover:text-blue-800">Cadastre-se</a>.</p>
    </div>

    <!-- INICIO FOOTER -->
    <footer class=" max-w-lg mx-auto  flex justify-center text-gray-400 pb-2 hover:text-gray-600">

        <!--LINK CONTATO-->
        <a href=""
            class="text-xs">
            Contato
        </a>

    </footer>
    <!-- FIM FOOTER -->

</body>
<!-- FIM BODY -->