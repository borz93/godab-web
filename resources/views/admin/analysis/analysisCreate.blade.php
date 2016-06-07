@extends('admin.layouts.master')
@section('page-title', 'Crear análisis')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Crear nuevo análisis en la web</h3>
                {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
            </div>
            @include('admin.layouts.messages')
            {!! Form::open(['url'=>'admin/guardar-analisis', 'method' =>'POST','files'=>true]) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('title','Título') !!}
                                {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Título']) !!}
                                <p class="help-block">Título del análisis. Debe ser único</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('brand','Marca') !!}
                                {!! Form::text('brand',null,['class'=>'form-control','placeholder' => 'Marca']) !!}
                                <p class="help-block">Marca del producto.</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product">Producto</label>
                                        {!! Form::label('product','Producto') !!}
                                        {!! Form::select('product', $products,null,['placeholder' => '-Selecciona producto-','class' => 'form-control dropdown-toggle','data-toggle'=>'dropdown','id'=>'product']) !!}
                                        <p class="help-block">Selecciona a que producto pertenece.</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('subproduct_id','Subproducto') !!}
                                        <select class="form-control dropdown-toggle" id="subproduct_id" name="subproduct_id">
                                            <option>-Escoge un producto primero-</option>
                                        </select>
                                        <p class="help-block">Selecciona a que subproducto pertenece.</p>
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
                                <p class="help-block">Pequeña descripción del análisis.</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('vote','Puntuación') !!}
                                <div class="well-sm">
                                    <input id="vote" name="vote" data-slider-id="blue" type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-tooltip="show"/>
                                </div>
                                <p class="help-block">Puntuación del análisis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('body','Cuerpo del análisis') !!}
                            {!! Form::textarea('body',null,['class'=>'form-control', 'id'=>'analysis-editor','placeholder' => 'Análisis']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags','Tags') !!}
                            {!! Form::text('tags',null,['class'=>'form-control','data-role'=>'tagsinput']) !!}
                            <p class="help-block">Palabras clave. Escribirlas correctamente y usar coma o enter para ir insertando.</p>
                        </div>
                    </div>
                    <div class="nutritional_info_parent">
                        <label>Información nutricional</label>
                        <p class="help-block">Datos de información nutricional. Unidades en gramos</p>
                        <div class="nutritional_info_child">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        {!! Form::label('nutritional_info_name','Nombre') !!}
                                        {!! Form::text('nutritional_info_name[]',null,['class'=>'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        {!! Form::label('nutritional_info_quantity_x','Por toma') !!}
                                        {!! Form::number('nutritional_info_quantity_x[]',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group">
                                        {!! Form::label('nutritional_info_quantity_y','Por 100 g') !!}
                                        {!! Form::number('nutritional_info_quantity_y[]',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="add-more" class="btn btn-success" type="button"><i class="fa fa-plus-circle"></i></button>
                        <button id="remove" class="btn btn-danger" type="button"><i class="fa fa-minus-circle"></i></button>
                    </div>
                </div>
                <div class="box-footer">
                    {!! Form::submit('Publicar', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script src={{ asset('/js/ckeditor/ckeditor.js') }}></script>
    <script src={{ asset('/js/bootstrap-tagsinput.min.js') }}></script>
    <script type="text/javascript">
        $('#product').on('change', function(e){
            var product_id = e.target.value;
            $.get('{{ url('admin/subproductos-de-productos') }}/' + product_id, function(data) {
                var model = $('#subproduct_id');
                model.empty();
                if(Object.keys(data).length > 0){
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.id +"'>" + element.name + "</option>");
                    });
                }else{
                    model.append("<option>No tiene subproducto</option>");
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var addButton = $('#add-more'); //Add button selector
            var remove = $('#remove'); //Add button selector
            var wrapper = $('.nutritional_info_child'); //Input field wrapper
            $(addButton).click(function(){
                wrapper.clone().appendTo('.nutritional_info_parent');
            });
            $(remove).click( function(){ //Once remove button is clicked
                var elements = $('.nutritional_info_parent').find('.nutritional_info_child');
                if (elements.length > 1) {
                    elements[elements.length - 1].remove();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $('#vote').slider({
            formatter: function(value) {
                return 'Voto: ' + value;
            },
            tooltip: 'always',
            ticks: [0, 10],
            ticks_labels: ['0', '10'],
        });
    </script>
    <script>
        CKEDITOR.replace('analysis-editor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
@endsection