<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Session;
use Illuminate\Http\Request;
USE SEO;
use App\Http\Requests;

class SessionController extends Controller
{
    public function show($genre,$session)
    {
        $session = Session::findBySlugOrFail($session);
        SEO::setDescription(str_limit($session->body,150));
        SEO::metatags()->addMeta('article:published_time', $session->created_at->toW3CString(), 'property');
        SEO::metatags()->addMeta('article:section','música','property');
        SEO::metatags()->addKeyword($session->tags);

        SEO::opengraph()->setTitle($session->title)
            ->addImage(url("image/cache/original/".$session->file->name))
            ->setArticle([
                'published_time' => $session->created_at->toW3CString(),
                'modified_time' => $session->updated_at->toW3CString(),
                'author' => $session->user->name,
                //'tag' => 'string / array'
            ]);
        return view('frontend.sessions.session',compact('session'));
    }
}
