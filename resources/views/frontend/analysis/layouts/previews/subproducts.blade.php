<div class="col-md-6 same-height">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="text-center text-warning post-title">
                {{link_to('analisis/'.$subproduct->product->slug.'/'.$subproduct->slug,$subproduct->name,['class'=>''])}}
            </h1>
            <div class="text-center">
                <img src="{{ url("image/cache/original/".$subproduct->file->name) }}" class="img-responsive image-preview-products">
            </div>
        </div>
        <div class="panel-body">
            <div class="custom-text">
                {!! $subproduct->description !!}
            </div>
        </div>
        <div class="panel-footer">
            {{link_to('analisis/'.$subproduct->product->slug.'/'.$subproduct->slug,'Entrar',['class'=>'btn btn-indigo'])}}
        </div>
    </div>
</div>