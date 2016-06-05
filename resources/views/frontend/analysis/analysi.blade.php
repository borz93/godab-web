@extends('frontend.layouts.master')
@section('page-title', $analysi->slug)
@section('content')

    <div class='row'>
        <div class='col-md-9'>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="custom-title">{{$analysi->title}}</h1>
                    <span><i class="fa fa-user fa-fw fa-orange"></i>{{$analysi->user->name}}</span>
                    <span>
                        <time datetime="{{date('F d, Y', strtotime($analysi->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('F d, Y', strtotime($analysi->created_at))}}</time>
                    </span>
                    <div class="clearfix"></div>
                    @each('frontend.layouts.tags.tags',explode(",", $analysi->tags),'tag')
                </div>
                <div class="panel-body">
                    <img src="{{ url("image/cache/original/".$analysi->file->name) }}" class="img-responsive image-full">
                        <div class="custom-text">
                            {!! $analysi->body !!}
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-3">
            @include('frontend.analysis.layouts.nutritionalinfo')
            @include('frontend.analysis.layouts.rate')
        </div>
        <div class='col-md-12'>
            @include('frontend.layouts.relatedcontent.analysis')
        </div>
        <div class="col-md-12">
            @include('frontend.layouts.social-media')
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('javascript')
@endsection