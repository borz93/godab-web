@extends('frontend.layouts.master')
@section('page-title', 'Contactar con nosotros')
@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <div class="jumbotron">
                <h1 class="jumbotron-title">Contactar con nosotros</h1>

                <p>¿Alguna duda? Si tienes cualquier pregunta, sugerencia, problema o informacion mas personalizada, no dudes en contactarnos.</p>
                <p>Te responderemos rapidamente y, por supuesto, los datos que nos proporciones son 100% privados y no se usaran con ningún fin.</p>

            </div>
            <div class="row">
                <div class="col-md-12">

                    @include('frontend.layouts.messages')
                    <div class="panel panel-default">

                        <div class="panel-body">

                            {!! Form::open(['url' => 'contactar', 'method' =>'POST','files'=>false,'class'=>'form-horizontal']) !!}

                                <div class="form-group">
                                    {!! Form::label('name','Nombre',['class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-5">
                                        {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Nombre','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email','Email',['class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-5">
                                        {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'Email','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('subject','Asunto',['class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::text('subject',null,['class' => 'form-control','placeholder' => 'Asunto','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('messagee','Mensaje',['class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::textarea('messagee',null,['class' => 'form-control','placeholder' => 'Aquí tu mensaje','rows'=>'5'],'required') !!}
                                        <span class="help-block">Escribe y comentanos lo que necesites.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('captcha','Captcha',['class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-2">
                                        {!! Captcha::img('flat') !!}
                                    </div>
                                    <div class="col-md-5">
                                        {!! Form::text('captcha',null,['class' => 'form-control','required']) !!}
                                        <span class="help-block">Inserta captcha. Distingue de mayúsculas y minúsculas.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        {!! Form::submit('Enviar',['class'=>'btn btn-raised btn-warning']) !!}
                                    </div>
                                </div>

                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('javascript')
@endsection