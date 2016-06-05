@extends('admin.layouts.master')
@section('page-title', 'Lista de noticias')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <!-- general form elements -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de noticias actualmente publicadas en la web</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.layouts.messages')
                <table id="posts-table" role="grid" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Última edición</th>
                            <th>Creado</th>
                            <th class="no-sort">Editar</th>
                            <th class="no-sort">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    {!! Form::open(['url'=>'admin/editar-noticia/'.$post->id, 'method' =>'GET','files'=>false]) !!}
                                    {!! Form::submit('Editar',['class'=>'mini btn btn-xs btn-warning']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['url'=>'admin/borrar-noticia/'.$post->id, 'method' =>'DELETE','files'=>false]) !!}
                                    {!! Form::submit('Eliminar',['class'=>'mini btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $posts->render() !!}
            </div>
        <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
<!-- /.row -->
</div>
@endsection

@section('javascript')
    <script>
        $(function () {
            $("#posts-table").DataTable({
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