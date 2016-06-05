<div class="panel panel-default panel-heading-custom-title">
    <div class="panel-heading">
        <h5>Ultimos Análisis</h5>
    </div>
    <div class="panel-body">
        <div class="list-group">
            @foreach($analysis as $analysi)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <div class="row-picture">
                                <img class="circle" src="{{ url("image/cache/small/".$analysi->file->name) }}" alt="icon">
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-9">
                            <h4 class="list-group-item-heading">
                                {{link_to('analisis/'.$analysi->subproduct->product->slug.'/'.$analysi->subproduct->slug.'/'.$analysi->slug,$analysi->title,['class'=>'custom-link'])}}
                            </h4>
                            <p>{!! strip_tags(str_limit($analysi->intro,60)) !!}</p>
                        </div>
                    </div>
                </div>
                <span class="label label-warning">{{date('F d, Y', strtotime($analysi->created_at))}}</span>
                {{link_to('analisis/'.$analysi->subproduct->product->slug,$analysi->subproduct->product->name,['class'=>'btn btn-raised btn-xs btn-warning'])}}
                {{link_to('analisis/'.$analysi->subproduct->product->slug.'/'.$analysi->subproduct->slug,$analysi->subproduct->name,['class'=>'btn btn-raised btn-xs btn-warning'])}}
                <div class="list-group-separator"></div>
            @endforeach
        </div>
    </div>
</div>