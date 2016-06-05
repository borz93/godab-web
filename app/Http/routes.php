<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Subproduct;
use App\Product;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more..
|
| Este grupo de rutas se aplica el grupo middleware "web" para cada ruta
| que contiene. El grupo middleware "web" se define en el núcleo HTTP
| e incluye el estado de sesión, la protección CSRF, y más.
|
*/

Route::group(['prefix' => 'admin','middleware' => 'web'], function(){
    Route::auth();
});

Route::group(['middleware' => 'web'], function () {

    Route::group(['namespace' => 'Frontend'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('noticias/', 'HomeController@showPosts');
        Route::get('noticias/{id}/{title}', 'PostController@show');
        Route::get('analisis/', 'HomeController@showProducts');
        Route::get('analisis/{product}', 'Products\ProductController@show');
        Route::get('analisis/{product?}/{subproduct}', 'Products\SubproductController@show');
        Route::get('analisis/{product}/{subproduct}/filtrar', 'AnalysisController@search');
        Route::get('analisis/{product}/{subproduct}/{analysis}', 'AnalysisController@show');
        Route::get('articulos/', 'HomeController@showArticles');
        Route::get('articulos/{product}/{article}', 'ArticleController@show');
        Route::get('musica/', 'HomeController@showSessionsGenres');
        Route::get('musica/{genre}', 'SessionGenreController@show');
        Route::get('musica/{genre}/{session}', 'SessionController@show');
        Route::get('resultado-busqueda', 'SearchController@search');
        Route::get('sobre', 'HomeController@showAbout');
        Route::get('contacto', 'HomeController@showContact');
        Route::post('contactar', 'MailController@contactSendMail');
    });
    Route::group(['middleware' => 'auth', 'prefix' => 'admin','namespace' => 'Admin'], function () {

        Route::get('/', 'AdminController@index');

        Route::get('lista-usuarios','UserController@index');
        Route::get('crear-usuario','UserController@create');
        Route::post('guardar-usuario','UserController@store');
        Route::get('perfil-usuario','UserController@show');
        Route::put('actualizar-usuario','UserController@update');

        Route::get('lista-noticias','PostController@index');
        Route::get('crear-noticia','PostController@create');
        Route::post('guardar-noticia','PostController@store');
        Route::get('editar-noticia/{id}','PostController@edit');
        Route::put('actualizar-noticia/{id}','PostController@update');
        Route::delete('borrar-noticia/{id}','PostController@destroy');

        Route::get('lista-analisis','AnalysisController@index');
        Route::get('crear-analisis','AnalysisController@create');
        Route::post('guardar-analisis','AnalysisController@store');
        Route::get('editar-analisis/{id}','AnalysisController@edit');
        Route::put('actualizar-analisis/{id}','AnalysisController@update');
        Route::delete('borrar-analisis/{id}','AnalysisController@destroy');
        Route::get('subproductos-de-productos/{id}','AnalysisController@searchSubproduct');
        Route::get('editar-informacion-nutricional/{id}','AnalysisController@editNutritionalInfo');
        Route::put('actualizar-informacion-nutricional/{id}','AnalysisController@updateNutritionalInfo');
        Route::delete('borrar-informacion-nutricional/{id}','AnalysisController@destroyNutritionalInfo');
        Route::post('guardar-informacion-nutricional/{id}','AnalysisController@storeNutritionalInfo');

        Route::get('lista-articulos','ArticleController@index');
        Route::get('crear-articulo','ArticleController@create');
        Route::post('guardar-articulo','ArticleController@store');
        Route::get('editar-articulo/{id}','ArticleController@edit');
        Route::put('actualizar-articulo/{id}','ArticleController@update');
        Route::delete('borrar-articulo/{id}','ArticleController@destroy');

        Route::get('lista-sesiones','SessionController@index');
        Route::get('crear-sesion','SessionController@create');
        Route::post('guardar-sesion','SessionController@store');
        Route::get('editar-sesion/{id}','SessionController@edit');
        Route::put('actualizar-sesion/{id}','SessionController@update');
        Route::delete('borrar-sesion/{id}','SessionController@destroy');

        Route::group(['prefix' => 'sesiones'],function() {
            Route::get('lista-generos', 'SessionGenreController@index');
            Route::get('crear-genero', 'SessionGenreController@create');
            Route::post('guardar-genero', 'SessionGenreController@store');
            Route::get('editar-genero/{id}', 'SessionGenreController@edit');
            Route::put('actualizar-genero/{id}', 'SessionGenreController@update');
            Route::delete('borrar-genero/{id}', 'SessionGenreController@destroy');
        });

        Route::get('alertas','AlertController@index');
        Route::post('guardar-alerta','AlertController@store');
        Route::put('editar-alerta','AlertController@update');

        Route::get('lista-mensajes','MessageController@index');
        Route::post('guardar-mensaje','MessageController@store');

        Route::group(['prefix' => 'productos','namespace' => 'Products'],function(){
            Route::get('lista-productos','ProductController@index');
            Route::get('crear-producto','ProductController@create');
            Route::post('guardar-producto','ProductController@store');
            Route::get('editar-producto/{id}','ProductController@edit');
            Route::put('actualizar-producto/{id}','ProductController@update');
            Route::delete('borrar-producto/{id}','ProductController@destroy');

            Route::get('lista-subproductos','SubproductController@index');
            Route::get('crear-subproducto','SubproductController@create');
            Route::post('guardar-subproducto','SubproductController@store');
            Route::get('editar-subproducto/{id}','SubproductController@edit');
            Route::put('actualizar-subproducto/{id}','SubproductController@update');
            Route::delete('borrar-subproducto/{id}','SubproductController@destroy');
        });

        Route::get('lista-slides', 'SlideImageController@index');
        Route::get('crear-slide', 'SlideImageController@create');
        Route::post('guardar-slide', 'SlideImageController@store');
        Route::get('editar-slide/{id}', 'SlideImageController@edit');
        Route::put('actualizar-slide/{id}', 'SlideImageController@update');
        Route::delete('borrar-slide/{id}', 'SlideImageController@destroy');
    });

//    Route::get('logout', 'Auth\AuthController@getLogout');
//    Route::get('logout', [
//        'uses' => 'Auth\AuthController@getLogout',
//        'as' => 'logout'
//    ]);
});
