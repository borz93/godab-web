<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;
use App\Analysis;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {

        $query = $request->q;
        $datas = new Collection();
        $datas->add(Post::search($query, true)->get()) ;
        $datas->add(Analysis::search($query,true)->get()) ;
        $datas->add(Article::search($query,true)->get()) ;

        $datas = $datas->filter(function ($item){
            if(!$item->isEmpty()){
                return $item;
            }
        });
        $datas=$datas->flatten();
//        dd($datas);
        return view('frontend.search.searchresults',compact('query','datas'));
    }
}
