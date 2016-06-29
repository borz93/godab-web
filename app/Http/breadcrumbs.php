<?php
// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Inicio', url('admin'));
});
//------------------------------------------------------------------------------------
// Home > Usuario
Breadcrumbs::register('user', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Usuario', url('admin/perfil-usuario'));
});
Breadcrumbs::register('user-list', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Usuarios', url('admin/lista-usuarios'));
});
Breadcrumbs::register('user-create', function($breadcrumbs)
{
    $breadcrumbs->parent('user-list');
    $breadcrumbs->push('Crear usuario', url('admin/crear-usuario'));
});
//------------------------------------------------------------------------------------
// Home > Noticias
Breadcrumbs::register('post', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Noticias', url('admin/lista-noticias'));
});

// Home > Noticias > [crear-noticia]
Breadcrumbs::register('post-create', function($breadcrumbs)
{
    $breadcrumbs->parent('post');
    $breadcrumbs->push('Crear noticia', url('admin/crear-noticia'));
});

// Home > Noticias > [editar-noticia]
Breadcrumbs::register('post-edit', function($breadcrumbs, $post)
{
    $breadcrumbs->parent('post');
    $breadcrumbs->push($post->title, url('admin/editar-noticia', $post->id));
});
//------------------------------------------------------------------------------------
// Home > Análisis
Breadcrumbs::register('analysis', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Análisis', url('admin/lista-analisis'));
});

// Home > Análisis > [crear-analisis]
Breadcrumbs::register('analysis-create', function($breadcrumbs)
{
    $breadcrumbs->parent('analysis');
    $breadcrumbs->push('Crear análisis', url('admin/crear-analisis'));
});

// Home > Análisis > [editar-analisis]
Breadcrumbs::register('analysis-edit', function($breadcrumbs, $analysis)
{
    $breadcrumbs->parent('analysis');
    $breadcrumbs->push($analysis->title, url('admin/editar-analisis', $analysis->id));
});

// Home > Análisis > [editar-analisis] > [editar-informacion-nutricional]
Breadcrumbs::register('nutritional-info-edit', function($breadcrumbs, $nutritionalInfo)
{
    $breadcrumbs->parent('analysis-edit',$nutritionalInfo->analysis);
    $breadcrumbs->push($nutritionalInfo->name, url('admin/editar-informacion-nutricional', $nutritionalInfo->id));
});
//------------------------------------------------------------------------------------
// Home > Artículos
Breadcrumbs::register('articles', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Artículos', url('admin/lista-articulos'));
});

// Home > Artículos > [crear-artículo]
Breadcrumbs::register('article-create', function($breadcrumbs)
{
    $breadcrumbs->parent('articles');
    $breadcrumbs->push('Crear artículo', url('admin/crear-articulo'));
});

// Home > Artículos > [editar-articulo]
Breadcrumbs::register('article-edit', function($breadcrumbs, $article)
{
    $breadcrumbs->parent('articles');
    $breadcrumbs->push($article->title, url('admin/editar-articulo', $article->id));
});
//------------------------------------------------------------------------------------
// Home > Productos
Breadcrumbs::register('products', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Productos', url('admin/productos/lista-productos'));
});
// Home > Productos > [crear-producto]
Breadcrumbs::register('product-create', function($breadcrumbs)
{
    $breadcrumbs->parent('products');
    $breadcrumbs->push('Crear producto', url('admin/productos/crear-producto'));
});
// Home > Productos > [editar-producto]
Breadcrumbs::register('product-edit', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('products');
    $breadcrumbs->push($product->name, url('admin/editar-articulo', $product->id));
});

// Home > Subroductos
Breadcrumbs::register('subproducts', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Subproductos', url('admin/productos/lista-subproductos'));
});
// Home > Subroductos > [crear-subroducto]
Breadcrumbs::register('subproduct-create', function($breadcrumbs)
{
    $breadcrumbs->parent('subproducts');
    $breadcrumbs->push('Crear subproducto', url('admin/productos/crear-subproducto'));
});
// Home > Subroductos > [editar-subroductos]
Breadcrumbs::register('subproduct-edit', function($breadcrumbs, $subproduct)
{
    $breadcrumbs->parent('subproducts');
    $breadcrumbs->push($subproduct->name, url('admin/productos/editar-subproducto', $subproduct->id));
});
//------------------------------------------------------------------------------------
// Home > Mensajes
Breadcrumbs::register('messages', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Mensajes', url('admin/lista-mensajes'));
});
//------------------------------------------------------------------------------------
// Home > Sesiones
Breadcrumbs::register('sessions', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Sesiones', url('admin/lista-sesiones'));
});
// Home > Sesiones > [crear-sesion]
Breadcrumbs::register('session-create', function($breadcrumbs)
{
    $breadcrumbs->parent('sessions');
    $breadcrumbs->push('Crear sesión', url('admin/crear-sesion'));
});
// Home > Sesiones > [editar-sesion]
Breadcrumbs::register('session-edit', function($breadcrumbs, $session)
{
    $breadcrumbs->parent('sessions');
    $breadcrumbs->push($session->title, url('admin/editar-sesion', $session->id));
});
//------------------------------------------------------------------------------------
// Home > Sesiones > Generos
Breadcrumbs::register('genres', function($breadcrumbs)
{
    $breadcrumbs->parent('sessions');
    $breadcrumbs->push('Géneros', url('admin/sesiones/lista-generos'));
});
// Home > Sesiones > Generos > [crear-genero]
Breadcrumbs::register('genre-create', function($breadcrumbs)
{
    $breadcrumbs->parent('genres');
    $breadcrumbs->push('Crear género', url('admin/sesiones/crear-genero'));
});
// Home > Sesiones > Generos > [editar-genero]
Breadcrumbs::register('genre-edit', function($breadcrumbs, $session_genre)
{
    $breadcrumbs->parent('genres');
    $breadcrumbs->push($session_genre->name, url('admin/sesiones/editar-genero', $session_genre->id));
});
//------------------------------------------------------------------------------------
// Home > Slides
Breadcrumbs::register('slides', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Sliders', url('admin/lista-slides'));
});
// Home > Slides > [crear-slide]
Breadcrumbs::register('slide-create', function($breadcrumbs)
{
    $breadcrumbs->parent('slides');
    $breadcrumbs->push('Crear slide', url('admin/crear-slide'));
});
// Home > Slides > [editar-slide]
Breadcrumbs::register('slide-edit', function($breadcrumbs, $slide_image)
{
    $breadcrumbs->parent('slides');
    $breadcrumbs->push($slide_image->name, url('admin/editar-slide', $slide_image->id));
});
//------------------------------------------------------------------------------------
//----------------------------------------FRONTEND------------------------------------
//------------------------------------------------------------------------------------

// Index
Breadcrumbs::register('index', function($breadcrumbs)
{
    $breadcrumbs->push('Inicio', url('/'));
});
//------------------------------------------------------------------------------------
// Index > Noticias
Breadcrumbs::register('noticias', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Noticias', url('noticias/'));
});
// Home > Noticias > [titulo-noticia]
Breadcrumbs::register('noticia', function($breadcrumbs, $post)
{
    $breadcrumbs->parent('noticias');
    $breadcrumbs->push($post->title, url('noticias/'.$post->id,$post->slug));
});
//------------------------------------------------------------------------------------
// Index > Analisis
Breadcrumbs::register('analisis', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Análisis', url('analisis/'));
});
// Home > Analisis > [producto]
Breadcrumbs::register('analisis-productos', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('analisis');
    $breadcrumbs->push($product->name, url('analisis',$product->slug));
});
// Home > Analisis > [producto] > [subproducto]
Breadcrumbs::register('analisis-productos-subproductos', function($breadcrumbs, $subproduct)
{
    $breadcrumbs->parent('analisis-productos',$subproduct->product);
    $breadcrumbs->push($subproduct->name, url('analisis/'.$subproduct->product->slug,$subproduct->slug));
});
// Home > Analisis > [producto] > [subproducto] > [analysis]
Breadcrumbs::register('analisis-productos-subproductos-analisi', function($breadcrumbs, $analysi)
{
    $breadcrumbs->parent('analisis-productos-subproductos',$analysi->subproduct);
    $breadcrumbs->push($analysi->title, url('analisis/'.$analysi->subproduct->product->slug.'/'.$analysi->subproduct->slug,$analysi->slug));
});
//------------------------------------------------------------------------------------
// Index > Artículos
Breadcrumbs::register('articulos', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Artículos', url('articulos/'));
});
// Home > Artículos > [articulo]
Breadcrumbs::register('articulos-articulo', function($breadcrumbs, $article)
{
    $breadcrumbs->parent('analisis');
    $breadcrumbs->push($article->title, url('articulos',$article->slug));
});
//------------------------------------------------------------------------------------
// Index > Música
Breadcrumbs::register('musica', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Música', url('musica/'));
});
// Home > Música > [genero]
Breadcrumbs::register('musica-genero', function($breadcrumbs, $genre)
{
    $breadcrumbs->parent('musica');
    $breadcrumbs->push($genre->name, url('musica',$genre->slug));
});
// Home > Música > [genero] > [sesion]
Breadcrumbs::register('musica-genero-sesion', function($breadcrumbs, $session)
{
    $breadcrumbs->parent('musica-genero',$session->sessionGenre);
    $breadcrumbs->push($session->title, url('musica/'.$session->sessionGenre->slug,$session->slug));
});
//------------------------------------------------------------------------------------
// Index > Sobre
Breadcrumbs::register('sobre', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Sobre', url('sobre/'));
});
//------------------------------------------------------------------------------------
// Index > Contacto
Breadcrumbs::register('contacto', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Contacto', url('contacto/'));
});