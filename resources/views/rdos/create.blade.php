@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cadastrar RDO</h2>

        <form action="{{ route('rdos.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="numero_rdo">Número do RDO</label>
                    <input type="text" class="form-control" id="numero_rdo" name="numero_rdo" required>
                </div>

                <div class="col-md-4">
                    <label for="data">Data</label>
                    <input type="date" class="form-control" id="data" name="data" required>
                </div>
                
                <div class="col-md-4">
                    <label for="dia_da_semana">Dia da Semana</label>
                    <input class="form-control" id="dia_da_semana" name="dia_da_semana" required>
                </div>
            </div>

            
            <script>
                //função que altera o dia da semana de acordo com a data selecionada
                document.getElementById('data').addEventListener('change', function() {
                    var dataSelecionada = new Date(this.value); //a variável recebe uma data
                    var diaDaSemana = dataSelecionada.getDay(); //a variável recebe um número do método getday()
                    var diasSemana = [ //esse número é de acordo com a lista
                        'Segunda-feira', //0
                        'Terça-feira',   //1
                        'Quarta-feira',  //3
                        'Quinta-feira',  //4
                        'Sexta-feira',   //5
                        'Sábado',        //6
                        'Domingo',       //7
                    ];
                    
                    document.getElementById('dia_da_semana').value = diasSemana[diaDaSemana];
                })
            </script>


            <div class="form-group">
                <label for="obra_id">Obra</label>
                <select class="form-control" id="obra_id" name="obra_id" required>
                    @foreach($obras as $obra)
                        <option value="{{ $obra->id }}">{{ $obra->objeto_contrato }} - {{ $obra->empresa_contratada }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Condição do Clima -->
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="manha">Condição da Manhã</label>
                    <select class="form-control" id="manha" name="manha" required>
                        <option value="bom">Bom</option>
                        <option value="chuva leve">Chuva leve</option>
                        <option value="chuva forte">Chuva forte</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="tarde">Condição da Tarde</label>
                    <select class="form-control" id="tarde" name="tarde" required>
                        <option value="bom">Bom</option>
                        <option value="chuva leve">Chuva leve</option>
                        <option value="chuva forte">Chuva forte</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="noite">Condição da Noite</label>
                    <select class="form-control" id="noite" name="noite" required>
                        <option value="bom">Bom</option>
                        <option value="chuva leve">Chuva leve</option>
                        <option value="chuva forte">Chuva forte</option>
                    </select>
                </div>
            </div>

            <!-- Condição da Área -->
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="condicao_area">Condição da Área</label>
                    <select class="form-control" id="condicao_area" name="condicao_area" required>
                        <option value="operavel">Operável</option>
                        <option value="operavel parcialmente">Operável parcialmente</option>
                        <option value="inoperavel">Inoperável</option>
                    </select>
                </div>

                <!-- Acidente -->
                <div class="col-md-4">
                    <label for="acidente">Acidente</label>
                    <select class="form-control" id="acidente" name="acidente" required>
                        <option value="nao houve">Não houve</option>
                        <option value="sem afastamento">Sem afastamento</option>
                        <option value="com afastamento">Com afastamento</option>
                    </select>
                </div>
            </div>

           <!-- Equipamentos Utilizados (Select com múltiplas opções) -->
           <div class="form-group">
                <label for="equipamentos">Equipamentos Utilizados</label>
                <select class="form-control" id="equipamentos" name="equipamentos[]" multiple required>
                    @foreach($equipamentos as $equipamento)
                        <option value="{{ $equipamento->id }}">{{ $equipamento->nome }} - {{ $equipamento->tipo }}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Selecione os equipamentos utilizados (mantenha pressionado Ctrl para selecionar múltiplos).</small>
            </div>

            <!-- Mão de Obra Utilizada (Select com múltiplas opções) -->
            <div class="form-group">
                <label for="maoObras">Mão de Obra Utilizada</label>
                <select class="form-control" id="maoObras" name="maoObras[]" multiple required>
                    @foreach($maoObras as $maoObra)
                        <option value="{{ $maoObra->id }}">{{ $maoObra->funcao }}</option> <!-- retirei - Quantidade: {{ $maoObra->quantidade }} -->
                    @endforeach
                </select>
                <small class="form-text text-muted">Selecione a mão de obra utilizada (mantenha pressionado Ctrl para selecionar múltiplos).</small>
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar RDO</button>
        </form>
    </div>
@endsection
