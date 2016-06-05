@extends('admin.layouts.master')
@section('page-title', 'Editar género')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar género. Será usado por las sesiones musicales.</h3>
                    {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
                </div>
                @include('admin.layouts.messages')
                {!! Form::open(['url'=>'admin/sesiones/actualizar-genero/'.$session_genre->id, 'method' =>'PUT','files'=>true]) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name','Nombre') !!}
                                {!! Form::text('name',$session_genre->name,['class'=>'form-control','placeholder' => 'Nombre']) !!}
                                <p class="help-block">Nombre del género. Debe ser único.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="thumbnail">
                                <img src="{{ url("image/cache/medium/".$session_genre->file->name) }}" alt="{{$session_genre->file->name}}">
                            </div>
                            <div class="form-group">
                                {!! Form::label('image','Imagen principal') !!}
                                {!! Form::file('image', null) !!}
                                <p class="help-block">Imagen del género.</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('description','Descripción') !!}
                        {!! Form::textarea('description',$session_genre->description,['class'=>'form-control','placeholder' => 'Breve descripción']) !!}
                        <p class="help-block">Descripción del género. Será mostrada a los usuarios.</p>
                    </div>
                </div>
                <div class="box-footer">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('javascript')
@endsection