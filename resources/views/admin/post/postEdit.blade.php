@extends('admin.layouts.master')
@section('page-title', 'Editar noticia')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Editar noticia: <strong>{{ $post->title }}</strong></h3>
                {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
            </div>
            @include('admin.layouts.messages')
            {!! Form::open(['url'=>'admin/actualizar-noticia/'.$post->id, 'method' =>'PUT','files'=>true]) !!}
            <div class="box-body">
                <div class='row'>
                    <div class='col-md-6'>
                        <div class="form-group">
                            {!! Form::label('title','Título') !!}
                            {!! Form::text('title',$post->title,['class'=>'form-control','placeholder' => 'Título']) !!}
                            <p class="help-block">Título de la noticia. Debe ser único</p>
                        </div>
                        <label>Fecha de publicación</label>
                        <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($post->created_at))}}</p>

                        <label>Última edición</label>
                        <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($post->updated_at))}}</p>
                    </div>
                    <div class='col-md-6'>
                        <div class="thumbnail">
                            <img src="{{ url("image/cache/medium/".$post->file->name) }}" alt="{{$post->file->name}}">
                        </div>
                        <div class="form-group">
                            {!! Form::label('image','Imagen principal') !!}
                            {!! Form::file('image', null) !!}
                            <p class="help-block">Imagen de portada de la noticia.</p>
                        </div>
                    </div>

                    <div class='col-md-12'>
                        <div class="form-group">
                            {!! Form::label('body','Cuerpo de la noticia.') !!}
                            {!! Form::textarea('body', $post->body,['class'=>'form-control', 'id'=>'post-editor','size' => '10x15']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags','Tags') !!}
                            {!! Form::text('tags',$post->tags,['class'=>'form-control','data-role'=>'tagsinput']) !!}
                            <p class="help-block">Palabras clave. Escribirlas correctamente y usar coma o enter para ir insertando.</p>
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            </div>
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
            language: 'es',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
        });
    </script>
@endsection