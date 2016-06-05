<div class="col-md-4 col-sm-6 col-xs-6 item">
    <div class="thumbnail">
        <img src="{{ url("image/cache/medium/".$session_genre->file->name) }}" alt="{{$session_genre->file->name}}">
        <div class="caption">
            <h3>{{$session_genre->name}}</h3>
            <p>{{$session_genre->description}}</p>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <p>
                        {!! Form::open(['url'=>'admin/sesiones/editar-genero/'.$session_genre->id, 'method' =>'GET','files'=>false]) !!}
                        {!! Form::submit('Editar',['type'=>'button', 'class'=>'mini btn btn-xs btn-warning btn-block']) !!}
                        {!! Form::close() !!}
                    </p>
                    <p>
                        {!! Form::open(['url'=>'admin/sesiones/borrar-genero/'.$session_genre->id, 'method' =>'DELETE','files'=>false]) !!}
                        {!! Form::submit('Eliminar',['type'=>'button','class'=>'mini btn btn-xs btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
