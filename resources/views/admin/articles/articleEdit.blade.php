@extends('admin.layouts.master')
@section('page-title', 'Editar artículo')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar artículo: <strong>{{ $article->title }}</strong></h3>
                    {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
                </div>
                @include('admin.layouts.messages')
                {!! Form::open(['url'=>'admin/actualizar-articulo/'.$article->id, 'method' =>'PUT','files'=>true]) !!}
                <div class="box-body">
                    <div class='row'>
                        <div class='col-md-6'>

                            <div class="form-group">
                                {!! Form::label('title','Título') !!}
                                {!! Form::text('title',$article->title,['class'=>'form-control','placeholder' => 'Título']) !!}
                            </div>

                            <label>Fecha de publicación</label>
                            <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($article->created_at))}}</p>

                            <label>Última edición</label>
                            <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($article->updated_at))}}</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('product_id','Producto') !!}
                                        {!! Form::select('product_id', $products,$article->product->id,['class' => 'form-control dropdown-toggle','data-toggle'=>'dropdown','id'=>'product_id']) !!}
                                        <p class="help-block">Selecciona a que producto pertenece.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class="thumbnail">
                                <img src="{{ url("image/cache/medium/".$article->file->name) }}" alt="{{$article->file->name}}">
                            </div>
                            <div class="form-group">
                                {!! Form::label('image','Imagen principal') !!}
                                {!! Form::file('image', null) !!}
                                <p class="help-block">Imagen de portada del artículo.</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('intro','Introduccíon') !!}
                                {!! Form::textarea('intro',$article->intro,['class'=>'form-control', 'id'=>'intro','placeholder' => 'Introducción','rows'=>'3']) !!}
                                <p class="help-block">Pequeña descripción del artículo. Será usado como texto de previsualización en el listado de artículos.</p>
                            </div>
                        </div>
                        <div class='col-md-12'>
                            <div class="form-group">
                                {!! Form::label('body','Cuerpo del artículo') !!}
                                {!! Form::textarea('body', $article->body,['class'=>'form-control', 'id'=>'article-editor','size' => '10x15']) !!}
                            </div>
                            <div class="callout callout-info">
                                <h4>Información</h4>
                                <p>Para insertar referencias en el editor de texto, pulsar el icono <i class="fa fa-flag" aria-hidden="true"></i> y escribirla.</p>
                                <p>La referencia DEBE ir sin tildes, espacios (usar "-" en su lugar) o símbolos. </p>
                                <p>En el campo bajo el editor escribirlas, en orden y de manera correcta. </p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('references','Referencias') !!}
                                {!! Form::text('references',$article->references,['class'=>'form-control','placeholder' => 'Referencias']) !!}
                                <p class="help-block">Referencias usadas en el índice y separadas por comas.</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('tags','Tags') !!}
                                {!! Form::text('tags',$article->tags,['class'=>'form-control','data-role'=>'tagsinput']) !!}
                                <p class="help-block">Palabras clave. Escribirlas correctamente y usar coma o enter para ir insertando.</p>
                            </div>
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
    </div>
    <!-- /.row -->
@endsection

@section('javascript')
    <script src={{ asset('/js/ckeditor/ckeditor.js') }}></script>

    <script>
        CKEDITOR.replace('article-editor', {
            language: 'es',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
        });
    </script>
@endsection