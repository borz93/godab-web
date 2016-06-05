@extends('admin.layouts.master')
@section('page-title', 'Lista de análisis')
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <!-- general form elements -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Lista de análisis actualmente publicados en la web</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.layouts.messages')
                    <table id="analysis-table" role="grid" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Marca</th>
                            <th>Autor</th>
                            <th>Subproducto</th>
                            <th>Última edición</th>
                            <th>Creado</th>
                            <th class="no-sort">Editar</th>
                            <th class="no-sort">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($analysis as $analysi)
                            <tr>
                                <td>{{ $analysi->id }}</td>
                                <td>{{ $analysi->title }}</td>
                                <td>{{ $analysi->brand }}</td>
                                <td>{{ $analysi->user->name }}</td>
                                <td>{{ $analysi->subproduct->name }}</td>
                                <td>{{ $analysi->updated_at }}</td>
                                <td>{{ $analysi->created_at }}</td>
                                <td>
                                    {!! Form::open(['url'=>'admin/editar-analisis/'.$analysi->id, 'method' =>'GET','files'=>false]) !!}
                                        {!! Form::submit('Editar',['class'=>'mini btn btn-xs btn-warning']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['url'=>'admin/borrar-analisis/'.$analysi->id, 'method' =>'DELETE','files'=>false]) !!}
                                        {!! Form::submit('Eliminar',['class'=>'mini btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $analysis->render() !!}
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
            $("#analysis-table").DataTable({
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