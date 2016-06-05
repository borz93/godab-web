@extends('admin.layouts.master')
@section('page-title', 'Editar análisis')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Editar análisis: <strong>{{ $analysis->title }}</strong></h3>
                {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
            </div>
            @include('admin.layouts.messages')
            {!! Form::open(['url'=>'admin/actualizar-analisis/'.$analysis->id, 'method' =>'PUT','files'=>true]) !!}
            <div class="box-body">
                <div class='row'>
                    <div class='col-md-6'>
                        <div class="form-group">
                            {!! Form::label('title','Título') !!}
                            {!! Form::text('title',$analysis->title,['class'=>'form-control','placeholder' => 'Título']) !!}
                            <p class="help-block">Título del análisis. Debe ser único</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('brand','Marca') !!}
                            {!! Form::text('brand',$analysis->brand,['class'=>'form-control','placeholder' => 'Marca']) !!}
                            <p class="help-block">Marca del producto.</p>
                        </div>
                        <label>Fecha de publicación</label>
                        <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($analysis->created_at))}}</p>

                        <label>Última edición</label>
                        <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($analysis->updated_at))}}</p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('product','Producto') !!}
                                    {!! Form::select('product', $products,$analysis->subproduct->product->id,['class' => 'form-control dropdown-toggle','data-toggle'=>'dropdown','id'=>'product']) !!}
                                    <p class="help-block">Selecciona a que producto pertenece.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('subproduct_id','Subproducto') !!}
                                    <select class="form-control dropdown-toggle" id="subproduct_id" name="subproduct_id">
                                        <option value="{{$analysis->subproduct->id}}">{{$analysis->subproduct->name}}</option>
                                    </select>
                                    <p class="help-block">Selecciona a que subproducto pertenece.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! link_to('admin/editar-informacion-nutricional/'.$analysis->nutritionalInfo->id,'Editar información nutricional',['class'=>'btn btn-info']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class="thumbnail">
                            <img src="{{ url("image/cache/medium/".$analysis->file->name) }}" alt="{{$analysis->file->name}}">
                        </div>
                        <div class="form-group">
                            {!! Form::label('image','Imagen principal') !!}
                            {!! Form::file('image', null) !!}
                            <p class="help-block">Imagen de portada del análisis.</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('intro','Introduccíon') !!}
                            {!! Form::textarea('intro',$analysis->intro,['class'=>'form-control', 'id'=>'intro','placeholder' => 'Introducción','rows'=>'3']) !!}
                            <p class="help-block">Pequeña descripción del análisis.</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('vote','Puntuación') !!}
                            <div class="well-sm">
                                <input id="vote" name="vote" data-slider-id="blue" type="text" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="{!! $analysis->vote !!}" data-slider-tooltip="show"/>
                            </div>
                            <p class="help-block">Puntuación del análisis.</p>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class="form-group">
                            {!! Form::label('body','Cuerpo del análisis') !!}
                            {!! Form::textarea('body', $analysis->body,['class'=>'form-control', 'id'=>'analysis-editor','size' => '10x15']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags','Tags') !!}
                            {!! Form::text('tags',$analysis->tags,['class'=>'form-control','data-role'=>'tagsinput']) !!}
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
                wrapper.empty();
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
    <script>
        CKEDITOR.replace('analysis-editor', {
            language: 'es',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
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
@endsection