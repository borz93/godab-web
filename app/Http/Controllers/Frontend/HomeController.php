<?php

namespace App\Http\Controllers\Frontend;

use App\Alert;
use App\Analysis;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use App\Session;
use App\SessionGenre;
use App\SlideImage;
use SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $slides = SlideImage::get();
        $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $analysis = Analysis::orderBy('created_at', 'desc')->take(5)->get();
        $sessions = Session::orderBy('created_at', 'desc')->get();
        $alert = Alert::where('active',true)->get();
        $randomsession = $sessions->slice(3)->random();
        $sessions = $sessions->take(3);
        $sessions->push($randomsession);

        SEO::setDescription('Godab.es - Tu web de información y actualidad sobre alimentación, dietas, ejercicio y todo para tener un cuerpo sano.');
        SEO::metatags()->addKeyword('Godab, nutrición, ejercicio, dieta, gimnasio, cuerpo');
        SEO::opengraph()->setTitle('Godab.es - Inicio');

        return view('frontend.index.index',compact('slides','posts','analysis','alert','sessions'));
    }
    public function showPosts()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(5);
        SEO::setDescription('Las noticias de Godab ordenadas. Enterarte de lo último en ejercicio y dieta.');
        SEO::metatags()->addKeyword('Godab, noticias, posts, noticia, gimnasio, nutrición');
        SEO::opengraph()->setTitle('Godab.es - Noticias');
        return view('frontend.posts.posts',compact('posts'));
    }
    public function showProducts()
    {
        $products = Product::get();
        return view('frontend.analysis.analysis',compact('products'));
    }
    public function showArticles()
    {
        $articles = Article::get();
        return view('frontend.articles.articles',compact('articles'));
    }
    public function showSessionsGenres()
    {
        $genres = SessionGenre::get();
        return view('frontend.sessions.genres',compact('genres'));
    }
    public function showAbout()
    {
        return view('frontend.about.about');
    }
    public function showContact()
    {
        return view('frontend.contact.contact');
    }

}
