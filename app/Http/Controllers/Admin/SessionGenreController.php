<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notification;
use App\SessionGenre;
use App\Http\Requests\SessionGenresRequest;
use App\File as FileModel;
use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SessionGenreController extends Controller
{
    public function index()
    {
        $session_genres = SessionGenre::orderBy('created_at', 'DESC')->paginate(10);
        Notification::readAllNotifications('session_genres');
        return view('admin.sessions.genres.sessionGenresList', compact('session_genres'));
    }

    public function create()
    {
        return view('admin.sessions.genres.sessionGenresCreate');
    }

    public function store(SessionGenresRequest $request)
    {
        $image = $request->file('image');     //Variable con la imagen recibida
        $file=$this->imageManipulate($image,$request->name);
        $file->save();
        $session_genre = new SessionGenre($request->except(['image']));
        $file->sessionGenre()->save($session_genre);
        return redirect('admin/sesiones/lista-generos')->with('succesMessage','Género: '.$session_genre->name.' creado!');
    }

    public function edit($id)
    {
        $session_genre = SessionGenre::findOrFail($id);
        return view('admin.sessions.genres.sessionGenreEdit',compact('session_genre'));
    }

    public function update(SessionGenresRequest $request, $id)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $session_genreToUpdate =  SessionGenre::findOrFail($id);
            $fileToUpdate = $session_genreToUpdate->file;
            if(Storage::disk('local')->exists('images/sessions/genre_images/'.$fileToUpdate->name)){
                Storage::delete('images/sessions/genre_images/'.$fileToUpdate->name);
                $file=$this->imageManipulate($image,$request->name,$fileToUpdate);
                $file->update();
                $session_genreToUpdate->update($request->except(['image']));
                return redirect('admin/sesiones/lista-generos')->with('editMessage','Género: '.$session_genreToUpdate->name.' editado!');
            }else
            {
                $session_genreToUpdate->update($request->except(['image']));
                return redirect('admin/sesiones/lista-generos')->with('editMessage','Género: '.$session_genreToUpdate->name.' editado con errores al actualizar la imagen');
            }
        }else
        {
            $session_genreToUpdate =  SessionGenre::findOrFail($id);
            $session_genreToUpdate->update($request->all());
            return redirect('admin/sesiones/lista-generos')->with('editMessage','Género: '.$session_genreToUpdate->name.' editado!');
        }
    }

    public function destroy($id)
    {
        $session_genreToDestroy = SessionGenre::findOrFail($id);
        $file = $session_genreToDestroy->file;
        if(Storage::disk('local')->exists('images/sessions/genre_images/'.$file->name))
        {
            Storage::delete('images/sessions/genre_images/'.$file->name);
            $file->delete($session_genreToDestroy);
            return redirect('admin/sesiones/lista-generos')->with('deleteMessage','Género eliminado!');
        }else
        {
            $file->delete($session_genreToDestroy);
            return redirect('admin/sesiones/lista-generos')->with('deleteMessage','Género eliminado con error al borrar la imagen!');
        }

    }
    private function imageManipulate($image,$fileName,$fileToUpdate = null)
    {
        if($fileToUpdate)
        {
            $file = $fileToUpdate;
        }else
        {
            $file = new FileModel();
        }
        $imageManager = new Image();
        $img = $imageManager->make($image->getRealPath())->encode('png');
        $img->resize(intval(500), null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->name = camel_case($fileName) . '_session_genre.png';
        $file->route = storage_path('app/images/sessions/genre_images/'). $file->name;
        $file->mimetype = $img->mime();
        $file->extension = $image->getClientOriginalExtension();
        $file->filesize = $img->filesize();
        $file->height = $img->height();
        $file->width = $img->width();
        $file->download = 0;
        $path = storage_path('app/images/sessions/genre_images/');
        File::makeDirectory($path,$mode = 0777, true, true);
        //Guarda la imagen en la ruta especifica
        $img->save($file->route);
        return $file;
    }
}
