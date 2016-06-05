{{--BACKEND AKA ADMIN--}}
@if(Request::is('admin'))
    {!! Breadcrumbs::render('home') !!}
@endif
@if(Request::is('admin/perfil-usuario'))
    {!! Breadcrumbs::render('user') !!}
@endif
@if(Request::is('admin/lista-usuarios'))
    {!! Breadcrumbs::render('user-list') !!}
@endif
@if(Request::is('admin/crear-usuario'))
    {!! Breadcrumbs::render('user-create') !!}
@endif

@if(Request::is('admin/lista-noticias'))
    {!! Breadcrumbs::render('post') !!}
@endif
@if(Request::is('admin/crear-noticia'))
    {!! Breadcrumbs::render('post-create') !!}
@endif
@if(Request::is('admin/editar-noticia/*'))
    {!! Breadcrumbs::render('post-edit',$post) !!}
@endif

@if(Request::is('admin/lista-analisis'))
    {!! Breadcrumbs::render('analysis') !!}
@endif
@if(Request::is('admin/crear-analisis'))
    {!! Breadcrumbs::render('analysis-create') !!}
@endif
@if(Request::is('admin/editar-analisis/*'))
    {!! Breadcrumbs::render('analysis-edit',$analysis) !!}
@endif
@if(Request::is('admin/editar-informacion-nutricional/*'))
    {!! Breadcrumbs::render('nutritional-info-edit',$nutritionalInfo) !!}
@endif

@if(Request::is('admin/lista-articulos'))
    {!! Breadcrumbs::render('articles') !!}
@endif
@if(Request::is('admin/crear-articulo'))
    {!! Breadcrumbs::render('article-create') !!}
@endif
@if(Request::is('admin/editar-articulo/*'))
    {!! Breadcrumbs::render('article-edit',$article) !!}
@endif

@if(Request::is('admin/productos/lista-productos'))
    {!! Breadcrumbs::render('products') !!}
@endif
@if(Request::is('admin/productos/crear-producto'))
    {!! Breadcrumbs::render('product-create') !!}
@endif
@if(Request::is('admin/productos/editar-producto/*'))
    {!! Breadcrumbs::render('product-edit',$product) !!}
@endif

@if(Request::is('admin/productos/lista-subproductos'))
    {!! Breadcrumbs::render('subproducts') !!}
@endif
@if(Request::is('admin/productos/crear-subproducto'))
    {!! Breadcrumbs::render('subproduct-create') !!}
@endif
@if(Request::is('admin/productos/editar-subproducto/*'))
    {!! Breadcrumbs::render('subproduct-edit',$subproduct) !!}
@endif

@if(Request::is('admin/lista-slides'))
    {!! Breadcrumbs::render('slides') !!}
@endif
@if(Request::is('admin/crear-slide'))
    {!! Breadcrumbs::render('slide-create') !!}
@endif
@if(Request::is('admin/editar-slide/*'))
    {!! Breadcrumbs::render('slide-edit',$slide_image) !!}
@endif

@if(Request::is('admin/lista-sesiones'))
    {!! Breadcrumbs::render('sessions') !!}
@endif
@if(Request::is('admin/crear-sesion'))
    {!! Breadcrumbs::render('session-create') !!}
@endif
@if(Request::is('admin/editar-sesion/*'))
    {!! Breadcrumbs::render('session-edit',$session) !!}
@endif

@if(Request::is('admin/sesiones/lista-generos'))
    {!! Breadcrumbs::render('genres') !!}
@endif
@if(Request::is('admin/sesiones/crear-genero'))
    {!! Breadcrumbs::render('genre-create') !!}
@endif
@if(Request::is('admin/sesiones/editar-genero/*'))
    {!! Breadcrumbs::render('genre-edit',$session_genre) !!}
@endif

@if(Request::is('admin/lista-mensajes'))
    {!! Breadcrumbs::render('messages') !!}
@endif
