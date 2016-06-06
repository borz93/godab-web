@extends('frontend.layouts.master')
@section('page-title', 'Géneros')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="jumbotron">
            <h1 class="jumbotron-title">Géneros</h1>
            <p>Una lista con los géneros de musica. Selecciona tu favorito y disfruta de sesiones de música para escuchar
            en tus momentos de ejercicio.</p>
        </div>
    </div>
</div>
<div class='row'>
    <div class="col-wrap">
        @each('frontend.sessions.layouts.previews.genres',$genres,'genre')
    </div>
</div>

@endsection

@section('javascript')
    <script src="{{ asset('/js/jquery.matchHeight.js') }}"></script>
    <script src="{{ asset('/js/jquery.dotdotdot.js') }}"></script>
    <script type="application/javascript">
        $(function() {
            $('.same-height').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
        });
    </script>
@endsection