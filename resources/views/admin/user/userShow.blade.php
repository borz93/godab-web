@extends('admin.layouts.master')
@section('page-title', 'Perfil de usuario')
@section('content')
<div class='row'>
    <div class='col-md-12'>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Perfil de: <strong>{{ Auth::user()->name }}</strong></h3>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
                                <img src="{{ url("image/cache/medium/".Auth::user()->avatarAction()) }}" class="img-circle img-responsive" alt="Avatar image">
                            </div>
                        </div>
                    </div>
                    <br class="bg-red">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#info" data-toggle="tab"><i class="fa fa-info"></i> Información</a> </li>
                                <li class=""><a href="#contributions" data-toggle="tab"><i class="fa fa-star"></i> Contribuciones</a></li>
                                <li class=""><a href="#change-data" data-toggle="tab"><i class="fa fa-user-secret"></i> Cambiar datos</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">

                            <div class="active tab-pane fade in active" id="info">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-user"></i> Nombre de usuario</h3>
                                            </div>
                                            <div class="panel-body">
                                                {{Auth::user()->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-at"></i> E-mail</h3>
                                            </div>
                                            <div class="panel-body">
                                                {{Auth::user()->email}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-group"></i> Rol</h3>
                                            </div>
                                            <div class="panel-body">
                                                {{Auth::user()->role}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-calendar-times-o"></i> Miembro desde</h3>
                                            </div>
                                            <div class="panel-body">
                                                {{Auth::user()->created_at}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="contributions">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-newspaper-o"></i> Noticias</h3>
                                            </div>
                                            <div class="panel-body">
                                                {{$posts}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-bar-chart"></i> Análisis</h3>
                                            </div>
                                            <div class="panel-body">
                                                {{$analysis}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-file-word-o"></i> Artículos</h3>
                                            </div>
                                            <div class="panel-body">
                                                {{$articles}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-music"></i> Sesiones</h3>
                                            </div>
                                            <div class="panel-body">
                                                {{$sessions}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="change-data">
                                <div class="callout callout-info">
                                    <h4>Información</h4>
                                    <p>La contraseña actual es necesaria para cualquier cambio.</p>
                                </div>
                                @include('admin.layouts.messages')

                                {!! Form::open(['url'=>'admin/actualizar-usuario/', 'method' =>'PUT', 'files'=>false,'class'=>'form-horizontal']) !!}

                                    <div class="form-group">
                                        <label class="control-label" for="name">Nombre de usuario. Actual: {{Auth::user()->name}}</label>
                                        {!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Nombre']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="password">Contraseña</label>
                                        {!! Form::password('password',['class'=>'form-control','placeholder' => 'Actual']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="new_password">Contraseña nueva</label>
                                        {!! Form::password('new_password',['class'=>'form-control','placeholder' => 'Nueva']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="new_password_confirmed">Repite contraseña nueva</label>
                                        {!! Form::password('new_password_confirmed',['class'=>'form-control','placeholder' => 'Repite']) !!}
                                    </div>

                                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>
@endsection
