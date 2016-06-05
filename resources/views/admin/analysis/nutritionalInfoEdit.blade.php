@extends('admin.layouts.master')
@section('page-title', 'Editar información nutricional')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar información nutricional de: <strong>{{ $nutritionalInfo->analysis->title }}</strong></h3>
                    {{link_to(URL::previous(),' Volver',['class'=>'btn btn-info pull-right'])}}
                </div>

                @include('admin.layouts.messages')
                <div class="box-body">
                    <label for="">Información nutricional</label>
                    @foreach($nutritionalInfo->nutritionalInfoDatas as $data)
                    <div class='row'>
                            {!! Form::open(['url'=>'admin/actualizar-informacion-nutricional/'.$data->id, 'method' =>'PUT','files'=>false]) !!}
                            <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('name','Nombre') !!}
                                        {!! Form::text('name',$data->name,['class'=>'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('quantity_x','Por toma') !!}
                                        {!! Form::number('quantity_x',$data->quantity_x,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('quantity_y','Por 100 g') !!}
                                        {!! Form::number('quantity_y',$data->quantity_y,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <label>Operaciones</label>
                            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                    <div class="form-group">
                                        <button class="btn btn-warning" type="submit">Editar</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                                {!! Form::open(['url'=>'admin/borrar-informacion-nutricional/'.$data->id, 'method' =>'DELETE','files'=>false]) !!}
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                    <div class="form-group">
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                    </div>
                    @endforeach
                    <div class="box-footer">
                        <div class='row'>
                            <label> Crear información nutricional</label>
                            {!! Form::open(['url'=>'admin/guardar-informacion-nutricional/'.$data->nutritional_info_id, 'method' =>'POST','files'=>false]) !!}
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    {!! Form::label('name','Nombre') !!}
                                    {!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Nombre','required']) !!}
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    {!! Form::label('quantity_x','Por toma') !!}
                                    {!! Form::number('quantity_x',null,['class'=>'form-control','required']) !!}
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    {!! Form::label('quantity_y','Por 100 g') !!}
                                    {!! Form::number('quantity_y',null,['class'=>'form-control','required']) !!}
                                </div>
                            </div>
                            <label>Operación</label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                {!!Form::submit('Guardar',['class'=>'btn btn-primary'])  !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                    </div>

                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('javascript')
@endsection