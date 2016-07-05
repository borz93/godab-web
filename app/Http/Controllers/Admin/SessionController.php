<?php

namespace App\Http\Controllers\Admin;

use App\SessionGenre;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Session;
use Embed\Embed;
use App\Notification;
use App\Http\Requests\SessionsRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\File as FileModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::orderBy('created_at', 'DESC')->paginate(10);
        Notification::readAllNotifications('session');
        return view('admin.sessions.sessionsList', compact('sessions'));
    }

    public function create()
    {
        $session_genres = SessionGenre::lists('name', 'id');
        return view('admin.sessions.sessionCreate',compact('session_genres'));
    }

    public function store(SessionsRequest $request)
    {
        $image = $request->file('image');//Variable con la imagen recibida
//        dd($image);
        $file = $this->imageManipulate($image,$request->title);
        $session = new Session($request->except(['image','video']));
        $session->user_id = Auth::user()->id;
        $video = Embed::create($request->video);
        $session->video = $video->code;
        Notification::makeNotification('session','Tienes sesiones nuevas','admin/lista-sesiones');
        $file->save();
        $file->session()->save($session);
        return redirect('admin/lista-sesiones')->with('succesMessage','Sesión: '.$session->title.' creada!');

    }

    public function edit($id)
    {
        $session = Session::findOrFail($id);
        $session_genres = SessionGenre::lists('name', 'id');
        return view('admin.sessions.sessionEdit',compact('session','session_genres'));
    }

    public function update(SessionsRequest $request, $id)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $sessionToUpdate =  Session::findOrFail($id);
            $fileToUpdate = $sessionToUpdate->file;
            if(Storage::disk('local')->exists('images/sessions/session_images/'.$fileToUpdate->name)){
                Storage::delete('images/sessions/session_images/'.$fileToUpdate->name);
                $file=$this->imageManipulate($image,$request->title,$fileToUpdate);
                $file->update();
                if($request->has('video'))
                {
                    $video = Embed::create($request->video);
                    $sessionToUpdate->video = $video->code;
                }
                $sessionToUpdate->update($request->except(['image','video']));
                return redirect('admin/lista-sesiones')->with('editMessage','Sesión: '.$sessionToUpdate->title.' editada!');
            }else
            {
                $sessionToUpdate->update($request->except(['image','video']));
                return redirect('admin/lista-sesiones')->with('editMessage','Sesión: '.$sessionToUpdate->title.' editado con errores al actualizar la imagen');
            }
        }else
        {
            $sessionToUpdate =  Session::findOrFail($id);
            if($request->has('video'))
            {
                $video = Embed::create($request->video);
                $sessionToUpdate->video = $video->code;
            }
            $sessionToUpdate->update($request->except(['video']));
            return redirect('admin/lista-sesiones')->with('editMessage','Sesión: '.$sessionToUpdate->title.' editada!');
        }
    }

    public function destroy($id)
    {
        $sessionToDestroy = Session::findOrFail($id);
        $file = $sessionToDestroy->file;
        if(Storage::disk('local')->exists('images/sessions/session_images/'.$file->name))
        {
            Storage::delete('images/sessions/session_images/'.$file->name);
            $file->delete($sessionToDestroy);
            return redirect('admin/lista-sesiones')->with('deleteMessage','Sesión eliminada!');
        }else
        {
            $file->delete($sessionToDestroy);
            return redirect('admin/lista-sesiones')->with('deleteMessage','Sesión eliminada con error al borrar la imagen!');
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
//        dd($image->getLinkTarget());
        $img = $imageManager->make($image->getLinkTarget())
            ->encode('png')
            ->resize(intval(500), null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $file->name = str_slug($fileName,'-') . '_session.png';
        $file->route = storage_path('app/images/sessions/session_images/'). $file->name;
        $file->mimetype = $img->mime();
        $file->extension = 'png';
        $file->filesize = $img->filesize();
        $file->height = $img->height();
        $file->width = $img->width();
        $file->download = 0;
        $path = storage_path('app/images/sessions/session_images/');
        File::makeDirectory($path,$mode = 0777, true, true);
        //Guarda la imagen en la ruta especifica
        $img->save($file->route);
        return $file;
    }
}
