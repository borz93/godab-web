@extends('frontend.layouts.master')
@section('page-title', 'Artículos')
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <div class="jumbotron">
                <h1 class="jumbotron-title">Artículos</h1>

                <p>Si lo que necesitas es informacion mas detallada o especifica, aqui encontraras articulos explicados para que no te quede ninguna duda.</p>

            </div>
            @each('frontend.articles.layouts.previews.article',$articles,'article')
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