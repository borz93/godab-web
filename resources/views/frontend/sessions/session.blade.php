@extends('frontend.layouts.master')
@section('page-title', $session->slug)
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="custom-title">{{$session->title}}</h1>
                    <span><i class="fa fa-music fa-fw fa-orange"></i>{{$session->sessionGenre->name}}</span>
                    <span><i class="fa fa-user fa-fw fa-orange"></i>{{$session->user->name}}</span>
                    <span>
                        <time datetime="{{date('F d, Y', strtotime($session->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('F d, Y', strtotime($session->created_at))}}</time>
                    </span>
                    <div class="clearfix"></div>
                    @each('frontend.layouts.tags.tags',explode(",", $session->tags),'tag')
                </div>
                <div class="panel-body">
                    <img src="{{ url("image/cache/original/".$session->file->name) }}" class="img-responsive image-full">

                    <div class="custom-text">
                        {!! $session->body !!}
                    </div>

                    <div class="well well-lg">
                        <div class="embed-responsive embed-responsive-16by9">
                            {!! $session->video !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            @include('frontend.layouts.social-media')
        </div>
        <!-- /.row -->
        @include('frontend.layouts.scrolltowrapper')
    </div>
@endsection

@section('javascript')
@endsection