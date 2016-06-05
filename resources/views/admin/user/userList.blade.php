@extends('admin.layouts.master')
@section('page-title', 'Lista de usuarios')
@section('content')

<div class='row'>
    <div class='col-md-9'>
        <!-- general form elements -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de usuarios actualmente reguistrados en la web</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                @include('admin.layouts.messages')
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Rol</th>
                        <th>Email</th>
                    </tr>

                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </table>
                {!! $users->render() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
        <!-- /.row -->
@endsection