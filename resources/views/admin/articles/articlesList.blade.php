@extends('admin.layouts.master')
@section('page-title', 'Lista de artículos')
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <!-- general form elements -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Lista de artículos actualmente publicados en la web</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.layouts.messages')
                    <table id="article-table" role="grid" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Producto</th>
                            <th>Última edición</th>
                            <th>Creado</th>
                            <th class="no-sort">Editar</th>
                            <th class="no-sort">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>{{ $article->product->name }}</td>
                                <td>{{ $article->updated_at }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>
                                    {!! Form::open(['url'=>'admin/editar-articulo/'.$article->id, 'method' =>'GET','files'=>false]) !!}
                                    {!! Form::submit('Editar',['class'=>'mini btn btn-xs btn-warning']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['url'=>'admin/borrar-articulo/'.$article->id, 'method' =>'DELETE','files'=>false]) !!}
                                    {!! Form::submit('Eliminar',['class'=>'mini btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $articles->render() !!}
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('javascript')
    <script>
        $(function () {
            $("#article-table").DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "order": [],
                "info": false,
                "autoWidth": false,
                "columnDefs": [ {
                    "targets"  : 'no-sort',
                    "orderable": false,
                }]
            });
        });
    </script>
@endsection