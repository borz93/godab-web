@extends('frontend.layouts.master')
@section('page-title', $post->slug)
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="custom-title">{{$post->title}}</h1>
                    <span><i class="fa fa-user fa-fw fa-orange"></i>{{$post->user->name}}</span>
                    <span>
                        <time datetime="{{date('F d, Y', strtotime($post->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('F d, Y', strtotime($post->created_at))}}</time>
                    </span>
                    @each('frontend.layouts.tags.tags',explode(",", $post->tags),'tag')
                </div>
                <div class="panel-body">
                    <img src="{{ url("image/cache/original/".$post->files()->first()->name) }}" class="img-responsive image-full">
                    <div class="custom-text">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-12'>
            @include('frontend.layouts.relatedcontent.posts')
        </div>
        <div class='col-md-12'>
            @include('frontend.layouts.social-media')
        </div>
        <!-- /.row -->
    </div>
    @include('frontend.layouts.scrolltowrapper')
@endsection

@section('javascript')
    <script type="text/javascript">
    </script>
@endsection