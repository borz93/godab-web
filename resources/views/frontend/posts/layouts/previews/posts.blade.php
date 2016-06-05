<article id="{{$post->id}}">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="text-center text-warning post-title">
                        {{link_to('noticias/'.$post->id.'/'.$post->slug,$post->title,['class'=>''])}}
                    </h1>
                    <div class="text-center image-wrapper">
                        <img src="{{ url("image/cache/original/".$post->files()->first()->name) }}" data-adaptive-background="1" class="img-responsive image-preview">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="custom-text truncate-text">
                        {!! $post->body !!}
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="clearfix">
                         <span>
                            <time datetime="{{date('F d, Y', strtotime($post->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('F d, Y', strtotime($post->created_at))}}</time>
                        </span>
                        {{link_to('noticias/'.$post->id.'/'.$post->slug,'Leer noticia',['class'=>'btn btn-indigo pull-right'])}}
                    </div>
                </div>
            </div>
        </div>
</article>
