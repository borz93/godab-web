@extends('frontend.layouts.master')
@section('page-title', 'Género - '.$genre->name)
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <div class="jumbotron">
                <h1 class="jumbotron-title">{{$genre->name}}</h1>

                <p>{{$genre->description}}</p>

            </div>
            @each('frontend.sessions.layouts.previews.sessions',$sessions,'session')
            {!! $sessions->render() !!}
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('/js/jquery.adaptive-backgrounds.js') }}"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $.adaptiveBackground.run({
                selector:             '[data-adaptive-background="1"]'
            });
            $('.custom-text').trunk8({
                lines: 2
            });
        });
    </script>
@endsection