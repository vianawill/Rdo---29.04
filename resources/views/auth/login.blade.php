<!-- INICIO HEAD -->

<head>

    <meta name="apple-mobile-web-app-status-bar" content="#01d679">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="manifest" href="/manifest.json">

    <link rel="apple-touch-icon" sizes="16x16" href="/pwa/icons/ios/16.png">
    <link rel="apple-touch-icon" sizes="20x20" href="/pwa/icons/ios/20.png">
    <link rel="apple-touch-icon" sizes="29x29" href="/pwa/icons/ios/29.png">
    <link rel="apple-touch-icon" sizes="32x32" href="/pwa/icons/ios/32.png">
    <link rel="apple-touch-icon" sizes="40x40" href="/pwa/icons/ios/40.png">
    <link rel="apple-touch-icon" sizes="50x50" href="/pwa/icons/ios/50.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/pwa/icons/ios/57.png">
    <link rel="apple-touch-icon" sizes="58x58" href="/pwa/icons/ios/58.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/pwa/icons/ios/60.png">
    <link rel="apple-touch-icon" sizes="64x64" href="/pwa/icons/ios/64.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/pwa/icons/ios/72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/pwa/icons/ios/76.png">
    <link rel="apple-touch-icon" sizes="80x80" href="/pwa/icons/ios/80.png">
    <link rel="apple-touch-icon" sizes="87x87" href="/pwa/icons/ios/87.png">
    <link rel="apple-touch-icon" sizes="100x100" href="/pwa/icons/ios/100.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/pwa/icons/ios/114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/pwa/icons/ios/120.png">
    <link rel="apple-touch-icon" sizes="128x128" href="/pwa/icons/ios/128.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/pwa/icons/ios/144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/pwa/icons/ios/152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="/pwa/icons/ios/167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/pwa/icons/ios/180.png">
    <link rel="apple-touch-icon" sizes="192x192" href="/pwa/icons/ios/192.png">
    <link rel="apple-touch-icon" sizes="256x256" href="/pwa/icons/ios/256.png">
    <link rel="apple-touch-icon" sizes="512x512" href="/pwa/icons/ios/512.png">
    <link rel="apple-touch-icon" sizes="1024x1024" href="/pwa/icons/ios/1024.png">

    <link href="/pwa/icons/ios/1024.png" sizes="1024x1024" rel="apple-touch-startup-image">
    <link href="/pwa/icons/ios/512.png" sizes="512x512" rel="apple-touch-startup-image">
    <link href="/pwa/icons/ios/256.png" sizes="256x256" rel="apple-touch-startup-image">
    <link href="/pwa/icons/ios/192.png" sizes="192x192" rel="apple-touch-startup-image">

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

<body class="body-bg pt-20 lg:pt-2 pb-1 px-2 md:px-0 overflow-hidden">

    <!-- INICIO HEADER -->
    <header class="container max-w-lg mx-auto">

        <!-- LOGO AlfaID -->
        <img class="mx-auto w-[240px] h-[128px] lg:w-[180px] lg:h-[78px] object-contain lg:pt-4"
            src="/img/navbar/Vector.png" alt="logo-alfaid">

    </header>

    <!-- TITULO -->
    <div class="titulo pt-2 pb-8">

        <h1 class="pt-2 text-[45px] lg:text-4xl font-bold text-white leading-tight whitespace-nowrap text-center">
            Registro Diario de Obra
        </h1>
    </div>

    <!-- FIM HEADER -->

    <!-- INICIO MAIN -->
    <!-- CONTAINER -->
    <main class="bg-secundario w-[900] h-[875] lg:w-[900] lg:h-[540] mx-auto p-10 lg:p-10 my-2 rounded-3xl shadow-2xl">

        <!--TEXTO CONTAINER-->
        <section>
            <h3 class="font-bold text-[50px] lg:text-2xl text-gray-100">Bem Vindo!</h3>
            <p class="text-[35px] lg:text-xl text-grey-600 pt-2 text-gray-100"">Entre com seu cadastro...</p>
        </section>

        <!--SECTION FORM-->
        <section class=" mt-10">
            <form class="flex flex-col" method="POST" action="{{ route('login') }}">
                @csrf

                <!--INPUT CPF-->
                <div class="mb-6 pt-3 w-[800px] h-[180] lg:w-[780px] lg:h-[70] rounded-3xl lg:rounded-xl bg-input mx-auto">

                    <label class="block text-txtblue text-[35px] lg:text-[15px] lg:text-sm font-bold mb-2 ml-3" for="cpf">CPF</label>
                    <input type="text" id="cpf" class="form-control @error('cpf') is-invalid @enderror
                     bg-input rounded-2xl lg:rounded-xl w-full h-[127px] lg:h-[80] text-[40px] lg:text-[30px] text-white focus:outline-none border-b-8 border-bdinput border-300 focus:border-txtblue focus:border-b-[10px] transition duration-500 px-3 pb-3"
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

                <!-- Espaço entre os inputs -->
                <div class="mb-6 lg:mb-[45px]"></div>

                <!--INPUT SENHA-->
                <div class="mb-6 pt-3 w-[800px] h-[180] lg:w-[780px] lg:h-[70] rounded-3xl lg:rounded-xl bg-input mx-auto">

                    <label class="block text-txtblue text-[35px] lg:text-[15px] font-bold mb-2 ml-3" for="password">Senha</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror
                    bg-input rounded-2xl lg:rounded-xl w-full h-[127px] lg:h-[80] text-[40px] lg:text-[30px] text-white focus:outline-none border-b-8 border-bdinput border-300 focus:border-txtblue focus:border-b-[15px] transition duration-500 px-3 pb-3"
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

                <div class="flex justify-end pt-4 lg:pt-10">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="btn btn-link  text-[25px] lg:text-[17px] text-txtblue hover:text-blue-800 hover:underline">
                        Esqueceu sua senha?
                    </a>
                    @endif
                </div>

                <!--BOTÃO LOGIN-->
                <div class="pt-6 mx-auto">
                    <button class="btn btn-primary
                 w-[480px] h-[100px] lg:h-[50] lg:w-[400] bg-txtblue hover:bg-blue-800 text-[35px] lg:text-sm text-white font-bold py-2 rounded-2xl shadow-lg hover:shadow-xl trasition duration-200 mx-auto"
                        type="submit">
                        {{ __('Login') }}
                    </button>
                </div>

        </section>
        </form><!--FIM SECTION FORM-->

    </main>
    <!--FIM CONTAINER-->
    <!-- FIM MAIN -->

    <!-- LINK CADASTRE-SE -->
    <div class="max-w-lg mx-auto text-center mt-8 mb-2">
        <p class="lg:text-sm text-[32px] text-gray-400 ">Não tem uma conta? <a href="{{ route('register') }}" class="text-txtblue hover:text-blue-800">Cadastre-se</a>.</p>
    </div>

    <!-- INICIO FOOTER -->
    <footer class=" max-w-lg mx-auto  flex justify-center text-gray-400 pb-2 hover:text-gray-600">

        <!--LINK CONTATO-->
        <a href=""
            class="lg:text-sm text-[30px]">
            Contato
        </a>

    </footer>
    <!-- FIM FOOTER -->

</body>
<!-- FIM BODY -->