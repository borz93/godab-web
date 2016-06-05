@extends('admin.layouts.master')
@section('page-title', 'Crear artículo')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Crear nuevo artículo en la web</h3>
                {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
            </div>
            @include('admin.layouts.messages')
            {!! Form::open(['url'=>'admin/guardar-articulo', 'method' =>'POST','files'=>true]) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('title','Título') !!}
                            {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Título']) !!}
                            <p class="help-block">Título del artículo. Debe ser único</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('product_id','Producto') !!}
                                    {!! Form::select('product_id', $products,null,['placeholder' => '-Selecciona producto-','class' => 'form-control dropdown-toggle','data-toggle'=>'dropdown','id'=>'product']) !!}
                                    <p class="help-block">Selecciona a que producto pertenece.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('image','Imagen principal') !!}
                            {!! Form::file('image', null) !!}
                            <p class="help-block">Imagen de portada del análisis.</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('intro','Introduccíon') !!}
                            {!! Form::textarea('intro',null,['class'=>'form-control', 'id'=>'intro','placeholder' => 'Introducción','rows'=>'3']) !!}
                            <p class="help-block">Pequeña descripción del artículo. Será usado como texto de previsualización en el listado de artículos.</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('body','Cuerpo del artículo') !!}
                            {!! Form::textarea('body',null,['class'=>'form-control', 'id'=>'analysis-editor','placeholder' => 'Artículo']) !!}
                        </div>
                        <div class="callout callout-info">
                            <h4>Información</h4>
                            <p>Para insertar referencias en el editor de texto, pulsar el icono <i class="fa fa-flag" aria-hidden="true"></i> y escribirla.</p>
                            <p>La referencia DEBE ir sin tildes, espacios (usar "-" en su lugar) o símbolos. </p>
                            <p>En el campo bajo el editor escribirlas, en orden y de manera correcta. </p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('references','Referencias') !!}
                            {!! Form::text('references',null,['class'=>'form-control','placeholder' => 'Referencias']) !!}
                            <p class="help-block">Referencias usadas en el índice y separadas por comas.</p>
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
        CKEDITOR.replace('analysis-editor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
@endsection