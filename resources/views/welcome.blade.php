@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5>{{ __('Aviso') }}</h5></div>
                <div class="card-body">
                    @if (Auth::check())
                        <div class="alert alert-success" role="alert">
                            {{ __('Você está logado!') }}
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            {{ __('Você não está logado.') }} <br>
                            {{ __('Faça login ou se cadastre.') }}
                        </div>
                    @endif

                </div> 
            </div>
           
        </div>
    </div>
</div>
@endsection
