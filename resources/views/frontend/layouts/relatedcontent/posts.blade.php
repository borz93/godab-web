<div class="panel panel-default">
    <div class="panel-heading panel-heading-custom-title">
        <h5>Tambien te puede interesar</h5>
    </div>
    <div class="panel-body">
        @foreach ($relateds->chunk(3) as $chunk)
            <div class="row">
                @foreach ($chunk as $related)
                    <div class="col-md-4">
                        <div class="list-group">
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-9">
                                        <div class="row-picture">
                                            <img class="circle" src="{{ url("image/cache/small/".$related->files()->first()->name) }}" alt="icon">
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <h4 class="list-group-item-heading">
                                            {{link_to('noticias/'.$related->id.'/'.$related->slug,$related->title,['class'=>'custom-link'])}}
                                        </h4>
                                        <p class="list-group-item-text">{!! strip_tags(str_limit($related->body,80))  !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>