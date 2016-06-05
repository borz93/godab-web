@extends('frontend.layouts.master')
@section('page-title', 'Noticias')
@section('content')
<div class="same-height">
    <div class='row'>
        <div class='col-md-12'>
            <div class="jumbotron">
                <h1 class="jumbotron-title">Noticias</h1>

                <p>En esta sección encontrarás las ultimas noticias relacionada con la web de manera ordenada.</p>

            </div>
            @each('frontend.posts.layouts.previews.posts',$posts,'post')
            {!! $posts->render() !!}
        </div>
        <!-- /.row -->
    </div>
</div>

@endsection

@section('javascript')
    <script src="{{ asset('/js/jquery.adaptive-backgrounds.js') }}"></script>
    <script src="{{ asset('/js/trunk8.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.adaptiveBackground.run({
                selector:             '[data-adaptive-background="1"]'
            });
            $('.truncate-text').trunk8({
                lines: 2
            });
        });
    </script>
@endsection