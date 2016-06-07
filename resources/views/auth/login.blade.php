<!DOCTYPE html>
<html>
@section('page-title', 'Login')
@include('admin.layouts.base')
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Admin</b>Godab
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        @include('admin.layouts.messages')
        <p class="login-box-msg">Introduce sus datos para acceder</p>
        {!! Form::open(['url' => 'admin/login', 'method'=>'post']) !!}
        <div class="form-group has-feedback">
            <input name="email" type="email" class="form-control" value="{{ old('email') }}">
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
            </div><!-- /.col -->
        </div>
        {!! Form::close() !!}
        <a href="#">Olvidé mi contraseña</a><br>
        {!! link_to('../','Volver a web principal') !!}
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/admin.js') }}"></script>
<script>
//    $(function () {
//        $('input').iCheck({
//            checkboxClass: 'icheckbox_square-blue',
//            radioClass: 'iradio_square-blue',
//            increaseArea: '20%' // optional
//        });
//    });
</script>
</body>
</html>