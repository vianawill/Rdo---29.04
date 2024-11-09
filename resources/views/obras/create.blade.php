@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cadastrar Nova Obra</h2>

        <form action="{{ route('obras.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="empresa_contratada">Empresa Contratada</label>
                <input type="text" class="form-control" id="empresa_contratada" name="empresa_contratada" required>
            </div>

            <div class="form-group">
                <label for="objeto_contrato">Objeto do Contrato</label>
                <input type="text" class="form-control" id="objeto_contrato" name="objeto_contrato" required>
            </div>

            <div class="form-group">
                <label for="tempo_total_contrato">Tempo Total do Contrato</label>
                <input type="text" class="form-control" id="tempo_total_contrato" name="tempo_total_contrato" required>
            </div>

            <div class="form-group">
                <label for="data_prevista_inicio_obra">Data Prevista de Início</label>
                <input type="date" class="form-control" id="data_prevista_inicio_obra" name="data_prevista_inicio_obra" required>
            </div>

            <div class="form-group">
                <label for="data_real_inicio_obra">Data Real de Início</label>
                <input type="date" class="form-control" id="data_real_inicio_obra" name="data_real_inicio_obra">
            </div>

            <div class="form-group">
                <label for="data_prevista_termino_obra">Data Prevista de Término</label>
                <input type="date" class="form-control" id="data_prevista_termino_obra" name="data_prevista_termino_obra" required>
            </div>

            <div class="form-group">
                <label for="data_real_termino_obra">Data Real de Término</label>
                <input type="date" class="form-control" id="data_real_termino_obra" name="data_real_termino_obra">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Obra</button>
        </form>
    </div>
@endsection
