@extends('frontend.layouts.master')
@section('page-title', $article->title)
@section('content')
<div class='row'>
    <div class='col-md-10'>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="custom-title">{{$article->title}}</h1>
                <span class="custom-span-x2"><i class="fa fa-user fa-fw fa-orange"></i>{{$article->user->name}}</span>
                <span class="custom-span-x2">
                    <time datetime="{{date('d/m/Y', strtotime($article->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('d/m/Y', strtotime($article->created_at))}}</time>
                </span>
            </div>
            <div class="panel-body">
                <img src="{{ url("image/cache/original/".$article->file->name) }}" class="img-responsive image-full">
                <div class="custom-text">
                    {!! $article->body !!}
                </div>
            </div>
        </div>
    </div>
    <div class='col-md-2'>
        @include('frontend.articles.layouts.contentindex')
    </div>
    <div class='col-md-12'>
        @include('frontend.layouts.social-media')
    </div>
</div>
    @include('frontend.layouts.scrolltowrapper')
@endsection

@section('javascript')

@endsection