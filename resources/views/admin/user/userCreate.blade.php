@extends('admin.layouts.master')
@section('page-title', 'Crear usuario')
@section('content')
    <div class='row'>
        <div class='col-md-7'>
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear nuevo usuario en la web</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                @include('admin.layouts.messages')
                {!! Form::open(['url'=>'admin/guardar-usuario', 'method' =>'POST','files'=>true]) !!}
                <div class="box-body">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        {!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Nombre']) !!}
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::email('email',null,['class'=>'form-control','placeholder' => 'Email']) !!}
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        {!! Form::password('password',['class'=>'form-control','placeholder' => 'Password']) !!}
                    </div>

                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        {!! Form::file('avatar', null) !!}
                        <p class="help-block">Imagen personal. Será mostrada en distintos ambitos.</p>
                    </div>

                    <div class="form-group">
                        <label for="role">Rol</label>
                        {!! Form::select('role',array('admin' => 'Admin', 'editor' => 'Editor', 'user' => 'Usuario'),null, ['class' => 'form-control']) !!}
                    </div>
                <!-- /.box-body -->
                </div>
                <div class="box-footer">
                    {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
</div>
@endsection