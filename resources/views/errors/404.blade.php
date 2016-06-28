@extends('frontend.layouts.master')
@section('page-title', 'Error 404 - Pagina no encotrada')
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <div class="error-box">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">¡Página no encontrada!</h3>
                    </div>
                    <div class="panel-body">
                        <p>No sabemos como habra llegado aquí, pero la página no existe :( </p>
                        <p>Pero no todo son malas noticias, puedes continuar navegando por la web, it's free :)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection