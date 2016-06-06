<article id="{{$analysi->id}}">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="text-center text-warning post-title">
                    {{link_to('analisis/'.$analysi->subproduct->product->slug.'/'.$analysi->subproduct->slug.'/'.$analysi->slug,$analysi->title,['class'=>''])}}
                </h1>
                <div class="text-center image-wrapper">
                    <img src="{{ url("image/cache/original/".$analysi->file->name) }}" data-adaptive-background="1" class="img-responsive image-preview">
                </div>
            </div>
            <div class="panel-body">
                <div class="custom-text">
                    {!! $analysi->body !!}
                </div>
            </div>
            <div class="panel-footer">
                <div class="clearfix">
                     <span class="custom-span-x2">
                        <time datetime="{{date('F d, Y', strtotime($analysi->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('F d, Y', strtotime($analysi->created_at))}}</time>
                    </span>
                    <span class="custom-span-x2"><i class="fa fa-copyright fa-fw fa-orange"></i>{{$analysi->brand}}</span>
                    <div class="clearfix"></div>
                    @each('frontend.layouts.tags.tags',explode(",", $analysi->tags),'tag')
                    {{link_to('analisis/'.$analysi->subproduct->product->slug.'/'.$analysi->subproduct->slug.'/'.$analysi->slug,'Leer análisis',['class'=>'btn btn-indigo pull-right'])}}
                </div>
            </div>
        </div>
    </div>
</article>
