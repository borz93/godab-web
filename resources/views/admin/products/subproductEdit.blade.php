@extends('admin.layouts.master')
@section('page-title', 'Editar subproducto')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Editar subproducto: <strong>{{ $subproduct->name }}</strong></h3>
                {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
            </div>
            @include('admin.layouts.messages')
            {!! Form::open(['url'=>'admin/productos/actualizar-subproducto/'.$subproduct->id, 'method' =>'PUT','files'=>true]) !!}
            <div class="box-body">
                <div class='row'>
                    <div class='col-md-6'>
                        <div class="form-group">
                            {!! Form::label('name','Nombre') !!}
                            {!! Form::text('name',$subproduct->name,['class'=>'form-control','placeholder' => 'Nombre']) !!}
                            <p class="help-block">Nombre del subproducto. Debe ser único.</p>
                        </div>

                        <div class="form-group">
                            {!! Form::label('product','Producto') !!}
                            {!! Form::select('product', $products,$subproduct->product->id,['class' => 'form-control dropdown-toggle','data-toggle'=>'dropdown']) !!}
                            <p class="help-block">Selecciona nuevo producto perteneciente.</p>
                        </div>

                        <label>Fecha de publicación</label>
                        <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($subproduct->created_at))}}</p>

                        <label>Última edición</label>
                        <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($subproduct->updated_at))}}</p>

                    </div>
                    <div class='col-md-6'>
                        <div class="thumbnail">
                            <img src="{{ url("image/cache/medium/".$subproduct->file->name) }}" alt="{{$subproduct->file->name}}">
                        </div>
                        <div class="form-group">
                            {!! Form::label('image','Imagen principal') !!}
                            {!! Form::file('image', null) !!}
                            <p class="help-block">Imagen del subproducto.</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('description','Descripción') !!}
                    {!! Form::textarea('description', $subproduct->description,['class'=>'form-control','size' => '8x5']) !!}
                    <p class="help-block">Descripción del subproducto. Será mostrada a los usuarios.</p>
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
@endsection