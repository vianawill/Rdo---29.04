@extends('layouts.app')

@section('content')

    <!-- INICIO MAIN -->
    <!-- CONTAINER -->
    <main class="container-base">

        <div class="grid-base">

            <div class="card-base">

                <!-- TEXTO CONTAINER -->
                <section>
                    <p class="title-section">Cadastrar Obra</p>
                </section>

                <!-- FORMULÁRIO -->
                <section class="section-form">
                    <form class="form-base" method="POST" action="{{ route('obras.store') }}">
                        @csrf

                        <div class="group-base">
                            <label class="label-base">Nome da Obra</label>
                            <input type="text" name="nome" id="nome" class="input-base" required>
                        </div>

                        <div class="group-base">
                            <label class="label-base">Empresa Contratada</label>
                            <input type="text" name="empresa_contratada" id="empresa_contratada" class="input-base" required>
                        </div>

                        <div class="group-base">
                            <label class="label-base">Objeto do Contrato</label>
                            <input type="text" name="objeto_contrato" id="objeto_contrato" class="input-base" required>
                        </div>

                        <div class="group-base">
                            <label class="label-base">Tempo Total do Contrato</label>
                            <input type="text" name="tempo_total_contrato" id="tempo_total_contrato" class="input-base" required>
                        </div>

                        <div class="group-base">
                            <label class="label-base">Data Prevista de Início</label>
                            <input type="date" name="data_prevista_inicio_obra" id="data_prevista_inicio_obra" class="input-base" required>
                        </div>

                        <div class="group-base">
                            <label class="label-base">Data Real de Início</label>
                            <input type="date" name="data_real_inicio_obra" id="data_real_inicio_obra" class="input-base">
                        </div>

                        <div class="group-base">
                            <label class="label-base">Data Prevista de Término</label>
                            <input type="date" name="data_prevista_termino_obra" id="data_prevista_termino_obra" class="input-base" required>
                        </div>

                        <div class="group-base">
                            <label class="label-base">Data Real de Término</label>
                            <input type="date" name="data_real_termino_obra" id="data_real_termino_obra" class="input-base">
                        </div>

                        <div class="group-base">
                            <label class="label-base">Descrição</label>
                            <textarea name="descricao" id="descricao" rows="5" class="textarea-base" placeholder="Insira a descrição aqui..."></textarea>
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