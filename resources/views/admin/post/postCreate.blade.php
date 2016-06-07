@extends('admin.layouts.master')
@section('page-title', 'Crear noticia')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Crear nueva noticia en la web</h3>
                {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
            </div>
            @include('admin.layouts.messages')
            {!! Form::open(['url'=>'admin/guardar-noticia', 'method' =>'POST','files'=>true]) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('title','Título') !!}
                                {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Título']) !!}
                                <p class="help-block">Título de la noticia. Debe ser único</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('image','Imagen principal') !!}
                                {!! Form::file('image', null) !!}
                                <p class="help-block">Imagen de portada de la noticia.</p>
                            </div>
                        </div>
                        <div class='col-md-12'>
                            <div class="form-group">
                                {!! Form::label('body','Cuerpo de la noticia') !!}
                                {!! Form::textarea('body',null,['class'=>'form-control', 'id'=>'post-editor','placeholder' => 'Noticia']) !!}
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
        CKEDITOR.replace('post-editor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
@endsection