@inject('navbar','App\Http\Controllers\Frontend\NavbarController')
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="javascript:void(0)">Brand</a>--}}
        </div>
        <div class="navbar-collapse collapse navbar-warning-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Helper::set_active('/') }}"><a href="{{url("/")}}">Inicio</a></li>
                <li class="{{ Helper::set_active('noticias*') }}"><a href="{{url("noticias")}}">Noticias</a></li>
                <li class="dropdown {{ Helper::set_active('analisis*') }}">
                    <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">
                        Análisis <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('analisis/')}}">Productos</a></li>
                        <li class="divider"></li>
                        @foreach($navbar->products() as $product)
                        <li><a href="{{url('analisis/'.$product->slug)}}">{{$product->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{ Helper::set_active('articulos*') }}"><a href="{{url("articulos")}}">Qué y como tomar</a></li>
                <li class="{{ Helper::set_active('musica') }}"><a href="{{url("musica")}}">Música</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url("contacto")}}">Contacto</a></li>
                <li><a href="{{url("sobre")}}">Sobre</a></li>
            </ul>
            {!! Form::open(['url' => 'resultado-busqueda', 'method' =>'get','files'=>false,'class'=>'navbar-form navbar-right']) !!}
                <div class="form-group">
                    {!! Form::text('q',null,['class'=>'form-control col-md-8','placeholder'=>'Buscar']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>