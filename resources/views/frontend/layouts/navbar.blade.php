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
                <li class="{{ Helper::set_active('/') }}">{!! link_to('/','Inicio') !!}</li>
                <li class="{{ Helper::set_active('noticias*') }}">{!! link_to('noticias','Noticias') !!}</li>
                <li class="dropdown {{ Helper::set_active('analisis*') }}">
                    <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">
                        Análisis <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>{!! link_to('analisis/','Productos') !!}</li>
                        <li class="divider"></li>
                        @foreach($navbar->products() as $product)
                        <li>{!! link_to('analisis/'.$product->slug,$product->name) !!}</li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{ Helper::set_active('articulos*') }}">{!! link_to('articulos','Qué y como tomar') !!}</li>
                <li class="{{ Helper::set_active('musica') }}">{!! link_to('musica','Música') !!}</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li> {!! link_to('contacto','Contacto') !!}</li>
                <li> {!! link_to('sobre','Sobre') !!}</li>
            </ul>
            {!! Form::open(['url' => 'resultado-busqueda', 'method' =>'get','files'=>false,'class'=>'navbar-form navbar-right']) !!}
                <div class="form-group">
                    {!! Form::text('q',null,['class'=>'form-control col-md-8','placeholder'=>'Buscar']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>