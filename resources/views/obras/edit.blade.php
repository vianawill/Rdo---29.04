@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Obra</h2>
        <form action="{{ route('obras.update', $obra) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome da Obra</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ $obra->nome }}" required>
            </div>
            
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="empresa_contratada">Empresa Contratada</label>
                    <input type="text" class="form-control" id="empresa_contratada" name="empresa_contratada" value="{{ $obra->empresa_contratada }}" required>
                </div>

                <div class="col-md-6">
                    <label for="objeto_contrato">Objeto do Contrato</label>
                    <input type="text" class="form-control" id="objeto_contrato" name="objeto_contrato" value="{{ $obra->objeto_contrato }}" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="tempo_total_contrato">Tempo Total do Contrato</label>
                    <input type="text" class="form-control" id="tempo_total_contrato" name="tempo_total_contrato" value="{{ $obra->tempo_total_contrato }}" required>
                </div>

                <div class="col-md-3">
                    <label for="data_prevista_inicio_obra">Data Prevista de Início</label>
                    <input type="date" class="form-control" id="data_prevista_inicio_obra" name="data_prevista_inicio_obra" value="{{ $obra->data_prevista_inicio_obra }}" required>
                </div>

                <div class="col-md-3">
                    <label for="data_real_inicio_obra">Data Real de Início</label>
                    <input type="date" class="form-control" id="data_real_inicio_obra" name="data_real_inicio_obra" value="{{ $obra->data_real_inicio_obra }}" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="data_prevista_termino_obra">Data Prevista de Término</label>
                    <input type="date" class="form-control" id="data_prevista_termino_obra" name="data_prevista_termino_obra" value="{{ $obra->data_prevista_termino_obra }}" required>
                </div>

                <div class="col-md-3">
                    <label for="data_real_termino_obra">Data Real de Término</label>
                    <input type="date" class="form-control" id="data_real_termino_obra" name="data_real_termino_obra" value="{{ $obra->data_real_termino_obra }}">
                </div>
                
                <div class="form-group row">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" rows="5" placeholder="Insira a descrição aqui" value="{{ $obra->descricao }}"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
