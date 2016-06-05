@extends('frontend.layouts.master')
@section('page-title', 'Análisis - '.$product->name)
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="jumbotron">
            <h1 class="jumbotron-title">{{$product->name}}</h1>
            <p>{{$product->description}}</p>
        </div>
    </div>
</div>
<div class='row'>
    @each('frontend.analysis.layouts.previews.subproducts',$product->subproducts,'subproduct')
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