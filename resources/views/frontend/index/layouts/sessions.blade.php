<div class="panel panel-default">
    <div class="panel-heading panel-heading-custom-title">
        <h5>Últimas sesiones en música</h5>
    </div>
    <div class="panel-body">
        @foreach ($sessions->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $session)
                    <div class="col-md-3">
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="row-picture">
                                    <img class="circle" src="{{ url("image/cache/small/".$session->file->name) }}" alt="icon">
                                </div>
                                <div class="row-content">
                                    <h4 class="list-group-item-heading">
                                        {{link_to('musica/'.$session->sessionGenre->slug.'/'.$session->slug,$session->title,['class'=>'custom-link'])}}
                                    </h4>
                                    <span class="custom-span">
                                        <time class="content-date" datetime="{{date('d/m/Y', strtotime($session->created_at))}}"><i class="fa fa-calendar-times-o fa-fw fa-orange"></i>{{date('d/m/Y', strtotime($session->created_at))}}</time>
                                    </span>
                                    {{--<p class="list-group-item-text">{!! strip_tags(str_limit($session->body,50)) !!}</p>--}}
                                </div>

                            </div>
                            {{link_to('musica/'.$session->sessionGenre->slug,$session->sessionGenre->name,['class'=>'btn btn-raised btn-xs btn-warning pull-left'])}}
                            {{link_to('musica/'.$session->sessionGenre->slug.'/'.$session->slug,'Ir Sesión',['class'=>'btn btn-raised btn-xs btn-indigo pull-right'])}}
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>