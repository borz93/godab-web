@extends('admin.layouts.master')
@section('page-title', 'Lista de productos')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <!-- general form elements -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de productos actualmente en la web</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.layouts.messages')
                <div class="row items-container">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 item">
                            <div class="thumbnail">
                                <img src="{{ url("image/cache/medium/".$product->file->name) }}" alt="{{$product->file->name}}">
                                <div class="caption">
                                    <h3>{{$product->name}}</h3>
                                    <p>{{$product->description}}</p>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 ">
                                            <p>
                                                {!! Form::open(['url'=>'admin/productos/editar-producto/'.$product->id, 'method' =>'GET','files'=>false]) !!}
                                                {!! Form::submit('Editar',['type'=>'button', 'class'=>'mini btn btn-xs btn-warning btn-block']) !!}
                                                {!! Form::close() !!}
                                            </p>
                                            <p>
                                                {!! Form::open(['url'=>'admin/productos/borrar-producto/'.$product->id, 'method' =>'DELETE','files'=>false]) !!}
                                                {!! Form::submit('Eliminar',['type'=>'button','class'=>'mini btn btn-xs btn-danger btn-block']) !!}
                                                {!! Form::close() !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {!! $products->render() !!}
                </div>
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
            $(this).children('.item').matchHeight({
                byRow:true
            });
        });
    </script>
@endsection