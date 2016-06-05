@extends('admin.layouts.master')
@section('page-title', 'Editar slide')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar slide: <strong>{{ $slide_image->name }}</strong></h3>
                    {{link_to(URL::previous(),'Volver',['class'=>'btn btn-info pull-right'])}}
                </div>
                @include('admin.layouts.messages')
                {!! Form::open(['url'=>'admin/actualizar-slide/'.$slide_image->id, 'method' =>'PUT','files'=>true]) !!}
                <div class="box-body">
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class="form-group">
                                {!! Form::label('name','Nombre') !!}
                                {!! Form::text('name',$slide_image->name,['class'=>'form-control','placeholder' => 'Nombre']) !!}
                                <p class="help-block">Nombre del slide. Debe ser único.</p>
                            </div>
                            <div class="form-group">
                                {!! Form::label('url','Url') !!}
                                {!! Form::text('url',$slide_image->url,['class'=>'form-control','placeholder' => 'Url']) !!}
                                <p class="help-block">Url a la que redireccionará la imagen. Dejar vacio si no tendrá url.</p>
                            </div>
                            <label>Fecha de publicación</label>
                            <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($slide_image->created_at))}}</p>

                            <label>Última edición</label>
                            <p><span class="fa fa-clock-o"></span> {{date('d-m-Y H\h:m\m', strtotime($slide_image->updated_at))}}</p>
                        </div>
                        <div class='col-md-6'>
                            {!! Form::label('','Imagen actual') !!}
                            <div class="thumbnail">
                                <img src="{{ url("image/cache/medium/".$slide_image->file->name) }}" alt="{{$slide_image->file->name}}">
                            </div>

                            {!! Form::label('image_preview','Nueva imagen') !!}
                            <div class="thumbnail">
                                <img src="{{ url("image/cache/medium/any_image_slider.png") }}" alt="image_preview" id="image_preview">
                            </div>

                            <div class="form-group">
                                {!! Form::label('image','Imagen') !!}
                                {!! Form::file('image', null) !!}
                                <p class="help-block">Imagen del slide.</p>
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