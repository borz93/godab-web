@extends('frontend.layouts.master')
@section('page-title', 'Resultado búsqueda')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="jumbotron">
            <h1 class="jumbotron-title">Resultados de búsqueda</h1>
            <p>Estos son los resultados para el término: <b>"{{$query}}"</b>.</p>
        </div>
        @each('frontend.search.layouts.result',$datas,'data')
    </div>
</div>
@endsection

@section('javascript')
@endsection