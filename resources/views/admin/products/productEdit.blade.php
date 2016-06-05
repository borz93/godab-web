@extends('admin.layouts.master')
@section('page-title', 'Editar producto')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Editar producto: <strong>{{ $product->name }}</strong></h3>
                {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
            </div>
            @include('admin.layouts.messages')
            {!! Form::open(['url'=>'admin/productos/actualizar-producto/'.$product->id, 'method' =>'PUT','files'=>true]) !!}
            <div class="box-body">
                <div class='row'>
                    <div class='col-md-6'>
                        <div class="form-group">
                            {!! Form::label('name','Nombre') !!}
                            {!! Form::text('name',$product->name,['class'=>'form-control','placeholder' => 'Nombre']) !!}
                            <p class="help-block">Nombre del producto. Debe ser único.</p>
                        </div>
                        <label>Fecha de publicación</label>
                        <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($product->created_at))}}</p>

                        <label>Última edición</label>
                        <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($product->updated_at))}}</p>
                    </div>
                    <div class='col-md-6'>
                        <div class="thumbnail">
                            <img src="{{ url("image/cache/medium/".$product->file->name) }}" alt="{{$product->file->name}}">
                        </div>
                        <div class="form-group">
                            {!! Form::label('image','Imagen principal') !!}
                            {!! Form::file('image', null) !!}
                            <p class="help-block">Imagen del producto.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description','Descripción') !!}
                        {!! Form::textarea('description', $product->description,['class'=>'form-control','size' => '8x5']) !!}
                        <p class="help-block">Descripción del producto. Será mostrada a los usuarios.</p>
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
@endsection