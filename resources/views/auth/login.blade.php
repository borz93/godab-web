<!DOCTYPE html>
<html>
@section('page-title', 'Login')
@include('admin.layouts.base')
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Admin</b>Godab
    </div>
    <div class="login-box-body">
        @include('admin.layouts.messages')
        <p class="login-box-msg">Introduce sus datos para acceder</p>
        {!! Form::open(['url' => 'admin/login', 'method'=>'post']) !!}
            <div class="form-group has-feedback">
                {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
                <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password',['class'=>'form-control']) !!}
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    {!! Form::submit('Acceder',['class'=>'btn btn-primary btn-block btn-flat']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        {{--<a href="#">Olvidé mi contraseña</a><br>--}}
        {!! link_to('/','Volver a web principal') !!}
    </div>
</div>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/admin.js') }}"></script>
</body>
</html>