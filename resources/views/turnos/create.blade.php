@extends('layouts.app')

@section('content')

    <!-- INICIO MAIN -->
    <!-- CONTAINER -->
    <main class="container-base">
        <div class="grid-base">
            <div class="card-base">

                <!-- TEXTO CONTAINER -->
                <section>
                    <p class="title-section">Cadastrar Turno</p>
                </section>

                <!-- FORMULÁRIO -->
                <section class="section-form">
                    <form class="form-base" method="POST" action="{{ route('turnos.store') }}">
                        @csrf

                        <div class="group-base">
                            <label class="label-base">Nome do Turno</label>
                            <input type="text" name="nome" id="nome" class="input-base" required>
                        </div>

                        <button type="submit" class="button-base">
                            Cadastrar
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </main>

    <!--FIM CONTAINER-->
    <!-- FIM MAIN -->

@endsection