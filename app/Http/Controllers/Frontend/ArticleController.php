<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SEO;
use App\Http\Requests;

class ArticleController extends Controller
{
    public function show($product,$article)
    {
        $article = Article::findBySlug($article);
        $references = explode(",", $article->references);
        for($i =0;$i<count($references);$i++){
            $referencesarray[str_slug($references[$i],'-')] = $references[$i];
        }
        SEO::setDescription(str_limit($article->intro,150));
        SEO::metatags()->addMeta('article:published_time', $article->created_at->toW3CString(), 'property');
        SEO::metatags()->addMeta('article:section','noticias','property');
        SEO::metatags()->addKeyword($article->tags);

        SEO::opengraph()->setTitle($article->title)
            ->addImage(url("image/cache/original/".$article->file->name))
            ->setArticle([
                'published_time' => $article->created_at->toW3CString(),
                'modified_time' => $article->updated_at->toW3CString(),
                'author' => $article->user->name,
                //'tag' => 'string / array'
            ]);
        return view('frontend.articles.article',compact('article','referencesarray'));
    }
}
