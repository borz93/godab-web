@extends('admin.layouts.master')
@section('page-title', 'Lista de sesiones')
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <!-- general form elements -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Lista de sesiones actualmente publicados en la web</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.layouts.messages')
                    <table id="sessions-table" role="grid" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Género</th>
                            <th>Video</th>
                            <th>Última edición</th>
                            <th>Creado</th>
                            <th class="no-sort">Editar</th>
                            <th class="no-sort">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                            @each('admin.sessions.layouts.sessionstable',$sessions,'session')
                        </tbody>
                    </table>
                    {!! $sessions->render() !!}
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
            $("#sessions-table").DataTable({
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