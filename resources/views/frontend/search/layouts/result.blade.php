@if($data->getTable() == 'posts')
    <div class="panel panel-default ">
        <div class="panel-heading search-result-title">
            {{$data->title}}
        </div>
        <div class="panel-body">
            {!! strip_tags(str_limit($data->body,135)) !!}
        </div>
        <div class="panel-footer">
            {{link_to('noticias/'.$data->id.'/'.$data->slug,'Ir',['class'=>'btn btn-indigo'])}}
        </div>
    </div>

@elseif($data->getTable() == 'analysis')
    <div class="panel panel-default">
        <div class="panel-heading search-result-title">
            {{$data->title}}
        </div>
        <div class="panel-body">
            {!! strip_tags(str_limit($data->body,135)) !!}
        </div>
        <div class="panel-footer">
            {{link_to('analisis/'.$data->subproduct->product->slug.'/'.$data->subproduct->slug.'/'.$data->slug,'Ir',['class'=>'btn btn-indigo'])}}
        </div>
    </div>

@elseif($data->getTable() == 'articles')
    <div class="panel panel-default ">
        <div class="panel-heading search-result-title">
            {{$data->title}}
        </div>
        <div class="panel-body">
            {!! strip_tags(str_limit($data->intro,135)) !!}
        </div>
        <div class="panel-footer">
            {{link_to('articulos/'.$data->id.'/'.$data->slug,'Ir',['class'=>'btn btn-indigo'])}}
        </div>
    </div>
@endif()