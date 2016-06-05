@extends('frontend.layouts.master')
@section('page-title', 'Análisis')
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <div class="jumbotron">
                <h1 class="jumbotron-title">Análisis</h1>

                <p>En esta sección encontrarás distintos analisis de distintos productos, ordenados por categorías, donde podrás enterarte mas detenidamente
                     de que estan compuestos, como tomarlos, etc.</p>

            </div>
            <div class="row col-wrap">
                @each('frontend.analysis.layouts.previews.products',$products,'product')
            </div>
        </div>
        <!-- /.row -->
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