@extends('frontend.layouts.master')
@section('page-title', 'Análisis - '.$subproduct->name)
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="jumbotron">
            <h1 class="jumbotron-title">{{$subproduct->name}}</h1>
            <p>{{$subproduct->description}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class='col-md-10'>
        <div class="row">
            @each('frontend.analysis.layouts.previews.analysis',$analysis,'analysi')
            {!! $analysis->render() !!}
        </div>
    </div>
    <div class="col-md-2">
        @include('frontend.analysis.layouts.filterbox')
    </div>
</div>
@endsection

@section('javascript')
    <script src="{{ asset('/js/jquery.adaptive-backgrounds.js') }}"></script>
    <script src="{{ asset('/js/trunk8.js') }}"></script>
    <script src="{{ asset('/js/nouislider.min.js') }}"></script>
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
    <script type="application/javascript">
        var skipSlider = document.getElementById('slider');
        noUiSlider.create(skipSlider, {
            start: [ 5 ],
            step: 1,
            range: {
                'min': [ 0 ],
                'max': [ 10 ]
            },
            format: {
                to: function ( value ) {
                    return value + '';
                },
                from: function ( value ) {
                    return value.replace(',-', '');
                }
            }
        });
        skipSlider.noUiSlider.on('update', function( values, handle ) {
            document.getElementById('vote-number').innerHTML = values[handle];
            document.getElementById('vote').value = values[handle];
        });
    </script>
@endsection