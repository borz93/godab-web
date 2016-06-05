@extends('admin.layouts.master')
@section('page-title', 'Crear slide')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Añadir slide. Será usado por el slider.</h3>
                    {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
                </div>
                @include('admin.layouts.messages')
                {!! Form::open(['url'=>'admin/guardar-slide', 'method' =>'POST','files'=>true]) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name','Nombre') !!}
                                {!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Nombre']) !!}
                                <p class="help-block">Nombre del slide. Debe ser único.</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('url','Url') !!}
                                {!! Form::text('url',null,['class'=>'form-control','placeholder' => 'Url']) !!}
                                <p class="help-block">Url a la que redireccionará la imagen. Dejar vacio si no tendrá url.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            {!! Form::label('image_preview','Previsualización del slide') !!}
                            <div class="thumbnail">
                                <img src="{{ url("image/cache/medium/any_image_slider.png") }}" alt="image_preview" id="image_preview">
                            </div>
                            <div class="form-group">
                                {!! Form::label('image','Imagen principal') !!}
                                {!! Form::file('image', null,['id'=>'image']) !!}
                                <p class="help-block">Imagen del producto.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    {!! Form::submit('Añadir', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('javascript')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function(){ readURL(this); });
    </script>
@endsection