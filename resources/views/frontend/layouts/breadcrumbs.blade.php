{{--FRONTEND--}}
@if(Request::is('/'))
    {!! Breadcrumbs::render('index') !!}
@endif

@if(Request::is('noticias'))
    {!! Breadcrumbs::render('noticias') !!}
@endif
@if(Request::is('noticias/*/*'))
    {!! Breadcrumbs::render('noticia',$post) !!}
@endif

@if(Request::is('analisis'))
    {!! Breadcrumbs::render('analisis') !!}
@endif
@if(Request::is('analisis/*') && isset($product))
    {!! Breadcrumbs::render('analisis-productos',$product) !!}
@endif
@if(Request::is('analisis/*/*') && isset($subproduct))
    {!! Breadcrumbs::render('analisis-productos-subproductos',$subproduct) !!}
@endif
@if(Request::is('analisis/*/*/*') && isset($analysi))
    {!! Breadcrumbs::render('analisis-productos-subproductos-analisi',$analysi) !!}
@endif

@if(Request::is('articulos'))
    {!! Breadcrumbs::render('articulos') !!}
@endif
@if(Request::is('articulos/*') && isset($article))
    {!! Breadcrumbs::render('articulos-articulo',$article) !!}
@endif

@if(Request::is('musica'))
    {!! Breadcrumbs::render('musica') !!}
@endif
@if(Request::is('musica/*') && isset($genre))
    {!! Breadcrumbs::render('musica-genero',$genre) !!}
@endif
@if(Request::is('musica/*/*') && isset($session))
    {!! Breadcrumbs::render('musica-genero-sesion',$session) !!}
@endif
