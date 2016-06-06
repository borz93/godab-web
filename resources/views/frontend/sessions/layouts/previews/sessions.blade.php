<article id="{{$session->id}}">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="text-center text-warning post-title">
                    {{link_to('musica/'.$session->sessionGenre->slug.'/'.$session->slug,$session->title,['class'=>''])}}
                </h1>
                <div class="text-center image-wrapper">
                    <img src="{{ url("image/cache/original/".$session->file->name) }}" data-adaptive-background="1" class="img-responsive image-preview">
                </div>
            </div>
            <div class="panel-body">
                <div class="custom-text">
                    {!! strip_tags(str_limit($session->body,135)) !!}
                </div>
            </div>
            <div class="panel-footer">
                <div class="clearfix">
                     <span class="custom-span-x2">
                        <time datetime="{{date('d/m/Y', strtotime($session->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('d/m/Y', strtotime($session->created_at))}}</time>
                    </span>
                    {{link_to('musica/'.$session->sessionGenre->slug.'/'.$session->slug,'Ver sesión',['class'=>'btn btn-indigo pull-right'])}}
                </div>
            </div>
        </div>
    </div>
</article>