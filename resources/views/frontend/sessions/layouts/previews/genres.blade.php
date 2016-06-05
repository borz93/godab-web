<div class="col-md-6 same-height">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="text-center text-warning post-title">
                {{link_to('musica/'.$genre->slug,$genre->name,['class'=>''])}}
            </h1>
            <div class="text-center">
                <img src="{{ url("image/cache/original/".$genre->file->name) }}" class="img-responsive image-preview-products">
            </div>
        </div>
        <div class="panel-body">
            <div class="custom-text">
                {!! $genre->description !!}
            </div>
        </div>
        <div class="panel-footer">
            {{link_to('musica/'.$genre->slug,'Entrar',['class'=>'btn btn-indigo'])}}
        </div>
    </div>
</div>