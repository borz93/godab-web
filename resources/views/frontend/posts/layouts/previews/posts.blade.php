<article id="{{$post->id}}">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="text-center text-warning post-title">
                        {{link_to('noticias/'.$post->id.'/'.$post->slug,$post->title,['class'=>''])}}
                    </h1>
                    <div class="text-center image-wrapper">
                        <img src="{{ url("image/cache/original/".$post->file->name) }}" data-adaptive-background="1" class="img-responsive image-preview">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="custom-text truncate-text">
                        {!! $post->body !!}
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="clearfix">
                         <span class="custom-span-x2">
                            <time datetime="{{date('d/m/Y', strtotime($post->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('d/m/Y', strtotime($post->created_at))}}</time>
                        </span>
                        <div class="clearfix"></div>
                        @each('frontend.layouts.tags.tags',explode(",", $post->tags),'tag')
                        {{link_to('noticias/'.$post->id.'/'.$post->slug,'Leer noticia',['class'=>'btn btn-indigo pull-right'])}}
                    </div>
                </div>
            </div>
        </div>
</article>
