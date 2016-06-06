@extends('frontend.layouts.master')
@section('page-title', $post->slug)
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="custom-title">{{$post->title}}</h1>
                    <span class="custom-span-x2"><i class="fa fa-user fa-fw fa-orange"></i>{{$post->user->name}}</span>
                    <span class="custom-span-x2">
                        <time datetime="{{date('d/m/Y', strtotime($post->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('d/m/Y', strtotime($post->created_at))}}</time>
                    </span>
                    <div class="clearfix"></div>
                    @each('frontend.layouts.tags.tags',explode(",", $post->tags),'tag')
                </div>
                <div class="panel-body">
                    <img src="{{ url("image/cache/original/".$post->file->name) }}" class="img-responsive image-full">
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