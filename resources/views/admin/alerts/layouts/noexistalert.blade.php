{!! Form::open(['url'=>'admin/guardar-alerta', 'method' =>'POST']) !!}
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('title','Título') !!}
                {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Título']) !!}
                <p class="help-block">Título o encabezado de la alerta.</p>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                {!! Form::label('message','Introduccíon') !!}
                {!! Form::textarea('message',null,['class'=>'form-control', 'id'=>'intro','placeholder' => 'Introducción','rows'=>'3']) !!}
                <p class="help-block">Mensaje de la alerta.</p>
            </div>
        </div>
        <div class="col-md-3">
            {!! Form::label('active','Activo') !!}
            {!! Form::select('active', ['1'=>'Activar','0'=>'Desactivar'],null,['class' => 'form-control dropdown-toggle','data-toggle'=>'dropdown']) !!}
            <p class="help-block">Si se encuentra en Activar, se mostrará, en caso contrario, no.</p>
        </div>
    </div>
</div>
<div class="box-footer">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}