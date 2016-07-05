<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use SEO;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $relateds = $this->related($post);
        SEO::setDescription(str_limit($post->body,150));
        SEO::metatags()->addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
        SEO::metatags()->addMeta('article:section','noticias','property');
        SEO::metatags()->addKeyword($post->tags);

        SEO::opengraph()->setTitle($post->title)
            ->addImage(url("image/cache/original/".$post->file->name))
            ->setArticle([
                'published_time' => $post->created_at->toW3CString(),
                'modified_time' => $post->updated_at->toW3CString(),
                'author' => $post->user->name,
                //'tag' => 'string / array'
            ]);

        return view('frontend.posts.post',compact('post','relateds'));
    }
    public function related($post)
    {
        $relateds = new Collection();
        $relateds->add(Post::where('id','!=',$post->id)->search($post->title,true)->take(3)->get());
        $relateds = $relateds->filter(function ($item){
            if(!$item->isEmpty()){
                return $item;
            }
        });
        $relateds->forget($post->id);
        $relateds=$relateds->flatten();
        return $relateds;
    }
}
