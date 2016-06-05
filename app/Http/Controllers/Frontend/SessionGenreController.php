<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\SessionGenre;
use Illuminate\Http\Request;

use App\Http\Requests;

class SessionGenreController extends Controller
{
    public function show($genre)
    {
        $genre = SessionGenre::findBySlugOrFail($genre);
        $sessions = $genre->sessions()->paginate(15);
        return view('frontend.sessions.genre',compact('genre','sessions'));
    }
}
