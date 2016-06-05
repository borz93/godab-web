@extends('admin.layouts.master')
@section('page-title', 'Lista de subproductos')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de subproductos actualmente en la web</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.layouts.messages')
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-12">
                            <div class="box box-info box-solid">
                                <div class="box-header with-border ">
                                    <h3 class="box-title">Producto: <small>{{$product->name}}</small></h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                @if(count($product->subproducts)>0)
                                    <div class="box-body items-container">
                                        @foreach($product->subproducts as $subproduct)
                                            <div class="col-md-4 col-sm-6 col-xs-6 item">
                                                <div class="thumbnail">
                                                    <img src="{{ url("image/cache/medium/".$subproduct->file->name) }}" alt="{{$subproduct->file->name}}">
                                                    <div class="caption">
                                                        <h3>{{$subproduct->name}}</h3>
                                                        <p>{{$subproduct->description}}</p>
                                                        <div class="row">
                                                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                                                <p>
                                                                    {!! Form::open(['url'=>'admin/productos/editar-subproducto/'.$subproduct->id, 'method' =>'GET','files'=>false]) !!}
                                                                    {!! Form::submit('Editar',['type'=>'button', 'class'=>'mini btn btn-xs btn-warning btn-block']) !!}
                                                                    {!! Form::close() !!}
                                                                </p>
                                                                <p>
                                                                    {!! Form::open(['url'=>'admin/productos/borrar-subproducto/'.$subproduct->id, 'method' =>'DELETE','files'=>false]) !!}
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
                                @else
                                    <div class="box-body">
                                        <div class="callout callout-warning" role="alert">
                                            <p>Este producto no tiene aun ningun subproducto. Para ello, cree uno.</p>
                                            {{link_to_action('Admin\Products\SubproductController@create',$title ='Crear subproducto')}}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            <!-- /.box -->
            </div>
        </div>
    <!-- /.col -->
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