<div class="panel panel-default panel-heading-custom-title">
    <div class="panel-heading">
        <h5>Ultimas noticias</h5>
    </div>
    <div class="panel-body">
        <div class="list-group">
            @foreach($posts as $post)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <div class="row-picture">
                                <img class="circle" src="{{ url("image/cache/small/".$post->files()->first()->name) }}" alt="icon">
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-9">
                            <h4 class="list-group-item-heading">
                                {{link_to('noticias/'.$post->id.'/'.$post->slug,$post->title,['class'=>'custom-link'])}}
                            </h4>
                            <span class="custom-span">
                                <time class="content-date" datetime="{{date('d/m/Y', strtotime($post->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('d/m/Y', strtotime($post->created_at))}}</time>
                            </span>
                            <p>{!! strip_tags(str_limit($post->body,80)) !!}</p>
                        </div>
                    </div>
                </div>
                {{link_to('noticias/'.$post->id.'/'.$post->slug,'Ir noticia',['class'=>'btn btn-raised btn-xs btn-indigo pull-right'])}}
                <div class="list-group-separator"></div>
            @endforeach
        </div>
    </div>
</div>