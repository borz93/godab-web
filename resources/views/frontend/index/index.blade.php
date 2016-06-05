@extends('frontend.layouts.master')
@section('page-title', 'Index')
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <!-- SLIDER -->
            @include('frontend.index.layouts.slider')
        </div>
        @if(!$alert->isEmpty() )
            <div class='col-md-12'>
                <!-- SLIDER -->
                @include('frontend.index.layouts.alert')
            </div>
        @endif
        <div class='col-md-6'>
            @include('frontend.index.layouts.posts')
        </div>
        <div class='col-md-6'>
            @include('frontend.index.layouts.analysis')
        </div>
        <div class='col-md-12'>
            @include('frontend.index.layouts.sessions')
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('javascript')
@endsection