@if($data->getTable() == 'posts')
    <div class="panel panel-default ">
        <div class="panel-heading search-result-title">
            {{$data->title}}
            <div class="clearfix"></div>
            <span class="label label-warning">Noticia</span>
        </div>
        <div class="panel-body">
            <p>{!! strip_tags(str_limit($data->body,150)) !!}</p>
        </div>
        <div class="panel-footer">
            {{link_to('noticias/'.$data->id.'/'.$data->slug,'Ir',['class'=>'btn btn-indigo'])}}
        </div>
    </div>

@elseif($data->getTable() == 'analysis')
    <div class="panel panel-default">
        <div class="panel-heading search-result-title">
            {{$data->title}}
            <div class="clearfix"></div>
            <span class="label label-warning">Análisis</span>
        </div>
        <div class="panel-body">
            <p>{!! strip_tags(str_limit($data->body,150)) !!}</p>
        </div>
        <div class="panel-footer">
            {{link_to('analisis/'.$data->subproduct->product->slug.'/'.$data->subproduct->slug.'/'.$data->slug,'Ir',['class'=>'btn btn-indigo'])}}
        </div>
    </div>

@elseif($data->getTable() == 'articles')
    <div class="panel panel-default ">
        <div class="panel-heading search-result-title">
            {{$data->title}}
            <div class="clearfix"></div>
            <span class="label label-warning">Artículo</span>
        </div>
        <div class="panel-body">
            <p>{!! strip_tags(str_limit($data->intro,150)) !!}</p>
        </div>
        <div class="panel-footer">
            {{link_to('articulos/'.$data->id.'/'.$data->slug,'Ir',['class'=>'btn btn-indigo'])}}
        </div>
    </div>
@endif()