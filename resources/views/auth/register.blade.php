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
<body class="body-bg pb-1 px-2 md:px-0 overflow-hidden">

    <!-- INICIO HEADER -->
   
    <!-- FIM HEADER -->


    <!-- INICIO MAIN -->
    <!-- CONTAINER -->
    <main class="bg-secundario w-11/12 max-w-sm mx-auto p-3 md:w-full md:max-w-lg md:p-4 my-8 rounded-lg shadow-2xl ">

        <!--TEXTO CONTAINER-->
        <section>

            <p class="text-lg text-grey-600 pt-2 text-gray-100"">
            Preencha com seus dados...
            </p>

        </section>

        <!--SECTION FORM-->
        <section class=" mt-10">
            <form class="flex flex-col" method="POST" action="{{ route('register') }}">
                @csrf

                <!--INPUT NOME-->
                <div class="mb-6 pt-3 rounded bg-input">

                    <label class="form-control @error('name') is-invalid @enderror block text-txtblue text-sm font-bold mb-2 ml-3" for="nome">Nome</label>
                    <input type="text" id="name"
                        class="form-control bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                        name="name"
                        value="{{ old('name') }}"
                        required>

                    <!-- ERRO INPUT NOME-->
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <!--INPUT CPF-->
                <div class="mb-6 pt-3 rounded bg-input">

                    <label class="block text-txtblue text-sm font-bold mb-2 ml-3" for="cpf">CPF</label>
                    <input type="text" id="cpf" class="form-control @error('cpf') is-invalid @enderror
                     bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput border-300 focus:border-txtblue transition duration-500 px-3 pb-3"
                        name="cpf"
                        maxlength="11"
                        value="{{ old('cpf') }}"
                        required
                        required
                        autocomplete="cpf"
                        autofocus
                        oninput="this.value =this.value.replace(/[^0-9]/g, '');">

                    <!--ERROR INPUT CPF-->
                    @error('cpf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <!--INPUT EMAIL-->
                <div class="mb-6 pt-3 rounded bg-input">

                    <label class="block text-txtblue text-sm font-bold mb-2 ml-3" for="email">Email</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror
                    bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email">

                    <!--ERROR INPUT EMAIL-->
                    @error('email')
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
                        autocomplete="new-password">

                    <!--ERROR INPUT SENHA-->
                    @error('password')
                    <span class="text-red-600 invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <!--INPUT CONFIRME A SENHA-->
                <div class="mb-6 pt-3 rounded bg-input">

                    <label class="block text-txtblue text-sm font-bold mb-2 ml-3" for="password-confirm">Confirme a Senha</label>
                    <input type="password" id="password-confirm"" class=" form-control @error('password') is-invalid @enderror
                        bg-input rounded w-full text-white focus:outline-none border-b-4 border-bdinput focus:border-blue-600 transition duration-500 px-3 pb-3"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password">

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

    </main>
    <!--FIM CONTAINER-->
    <!-- FIM MAIN -->

</body>
<!-- FIM BODY -->