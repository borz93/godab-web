@extends('admin.layouts.master')
@section('page-title', 'Lista de slides')
@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- general form elements -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Lista de slides actualmente en la web</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.layouts.messages')
                    @if(count($slide_images)>0)
                        <div class="row items-container">
                            @foreach($slide_images as $slide_image)
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 item-height">
                                    <div class="thumbnail">
                                        <img src="{{ url("image/cache/medium/".$slide_image->file->name) }}" alt="{{$slide_image->file->name}}">
                                        <div class="caption">
                                            <h3>{{$slide_image->name}}</h3>
                                            <div class="row">
                                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 ">
                                                    <p>
                                                        {!! Form::open(['url'=>'admin/editar-slide/'.$slide_image->id, 'method' =>'GET','files'=>false]) !!}
                                                        {!! Form::submit('Editar',['type'=>'button', 'class'=>'mini btn btn-xs btn-warning btn-block']) !!}
                                                        {!! Form::close() !!}
                                                    </p>
                                                    <p>
                                                        {!! Form::open(['url'=>'admin/borrar-slide/'.$slide_image->id, 'method' =>'DELETE','files'=>false]) !!}
                                                        {!! Form::submit('Eliminar',['type'=>'button','class'=>'mini btn btn-xs btn-danger btn-block']) !!}
                                                        {!! Form::close() !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('carousel-preview','Previsualización del slider') !!}
                            <div id="carousel-preview" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @for($i=0;$i<count($slide_images);$i++)
                                        <li data-target="#carousel-preview" data-slide-to="{!! $i !!}" class="@if($i ==0) active @endif"></li>
                                    @endfor
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @for($i=0;$i<count($slide_images);$i++)
                                        <div class="item @if($i ==0) active @endif">
                                            <img src="{{url("image/cache/original/".$slide_images[$i]->file->name)}}" alt="{{$slide_images[$i]->file->name}}">
                                            <div class="container">
                                                <div class="carousel-caption">
                                                    <h2>{!! $slide_images[$i]->name !!}</h2>
                                                    <p>{{link_to($slide_images[$i]->url,'Ver',['class'=>'btn btn-flat btn-info'])}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                <a class="left carousel-control" href="#carousel-preview" data-slide="prev">
                                    <span class="fa fa-angle-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-preview" data-slide="next">
                                    <span class="fa fa-angle-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="box-body">
                            <div class="callout callout-warning" role="alert">
                                <p>No existen imagenes para el slider. Para ello, cree una.</p>
                                {{link_to_action('Admin\SlideImageController@create',$title ='Crear slide')}}
                            </div>
                        </div>
                    @endif
                    <!-- /.box -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('/js/jquery.matchHeight.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('.items-container').each(function() {
            $(this).children('.item-height').matchHeight({
                byRow:true
            });
        });
    </script>
@endsection