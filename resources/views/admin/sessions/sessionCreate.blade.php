@extends('admin.layouts.master')
@section('page-title', 'Crear sesión')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear nueva sesión en la web</h3>
                    {{link_to(URL::previous(),' Volver',['class'=>'btn btn-info pull-right'])}}
                </div>
                @include('admin.layouts.messages')
                {!! Form::open(['url'=>'admin/guardar-sesion', 'method' =>'POST','files'=>true]) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('title','Título') !!}
                                {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Título']) !!}
                                <p class="help-block">Título de la sesión. Debe ser único</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('video','Video') !!}
                                {!! Form::text('video',null,['class'=>'form-control','placeholder' => 'video']) !!}
                                <p class="help-block">La url del video.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('image','Imagen principal') !!}
                                {!! Form::file('image', null) !!}
                                <p class="help-block">Imagen de portada de la sesion.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('session_genre_id','Género') !!}
                                {!! Form::select('session_genre_id', $session_genres,null,['placeholder' => '-Selecciona género-','class' => 'form-control dropdown-toggle','data-toggle'=>'dropdown','id'=>'genre']) !!}
                                <p class="help-block">Selecciona a que género pertenece.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('body','Cuerpo de la sesión') !!}
                                {!! Form::textarea('body',null,['class'=>'form-control', 'id'=>'session-editor','placeholder' => 'Sesión']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('tags','Tags') !!}
                                {!! Form::text('tags',null,['class'=>'form-control','data-role'=>'tagsinput']) !!}
                                <p class="help-block">Palabras clave. Escribirlas correctamente y usar coma o enter para ir insertando.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    {!! Form::submit('Publicar', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('javascript')
    <script src={{ asset('/js/ckeditor/ckeditor.js') }}></script>
    <script src={{ asset('/js/bootstrap-tagsinput.min.js') }}></script>
    <script>
        CKEDITOR.replace('session-editor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
@endsection