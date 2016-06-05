<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Session;
use Illuminate\Http\Request;

use App\Http\Requests;

class SessionController extends Controller
{
    public function show($genre,$session)
    {
        $session = Session::findBySlugOrFail($session);
        return view('frontend.sessions.session',compact('session'));
    }
}
