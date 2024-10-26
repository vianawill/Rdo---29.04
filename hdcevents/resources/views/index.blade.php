@extends('layouts.principal')
@section('titulo', 'Controle de estoque')
@section('conteudo')
    
    <div id="container-busca" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="texto" id="busca" name="busca" class="form-control" placeholder="Procurar..."/>
        </form>
    </div>
    <div id="container-eventos" class="col-md-12">
        <h3>Próximos eventos</h3>
        <p>Veja os próximos enventos</p>
        <div id="container-cartoes" class="row">
            @foreach($eventos as $evento)
                <div class="card-col-md-3">
                    <img src="" alt="">
                    <div class="card-cartao">
                        <p class="data-cartao">10/09/2020</p>
                        <h5 class="titulo-cartao">{{ $evento->titulo }}</h5>
                        <p class="participantes-cartao">X Participantes</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection