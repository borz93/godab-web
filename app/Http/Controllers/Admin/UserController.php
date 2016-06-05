<?php

namespace App\Http\Controllers\Admin;
use App\Analysis;
use App\Article;
use App\Post;
use App\Session;
use App\User;
use App\File as FileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.user.userList',compact('users'));
    }

    public function create()
    {
        return view('admin.user.userCreate');
    }

    public function store(Requests\UserRequest $request)
    {
        $image = $request->file('avatar');     //Variable con la imagen recibida
        $file=$this->imageManipulate($image,$request->name);
        //Objeto User y sus atributos
        $user = new User($request->except(['avatar']));
        //Guarda la imagen en la bd y guarda el user con la relacion
        $file->save();
        $file->user()->save($user);
        return redirect('admin');

    }

    public function show()
    {
        $analysis = Analysis::where('user_id',Auth::user()->id)->count();
        $posts = Post::where('user_id',Auth::user()->id)->count();
        $articles = Article::where('user_id',Auth::user()->id)->count();
        $sessions = Session::where('user_id',Auth::user()->id)->count();
        return view('admin.user.userShow',compact('analysis','posts','articles','sessions'));
    }

    public function edit()
    {

    }
    public function update(Requests\UserRequest $request)
    {
        $user = Auth::user();
        if (Hash::check($request->password, $user->password))
        {
            if ($request->has('new_password'))
            {
                $user->password = bcrypt($request->new_password);

            }
            if ($request->has('name'))
            {
                $user->name = $request->name;
                $user->save();
            }
            return redirect('admin/perfil-usuario')->with('succesMessage','Cambios realizados con exito.');
        }else
        {
            return redirect('admin/perfil-usuario')->withErrors('La contraseña actual no coincide.');
        }

    }

    private function imageManipulate($image,$fileName)
    {
        $file = new FileModel();
        $imageManager = new Image();
        $img = $imageManager->make($image->getRealPath())->encode('png');
        $img->resize(intval(500), null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $file->name = camel_case($fileName) . '_avatar.png';
        $file->route = storage_path('app/images/admin/avatar/'). $file->name;
        $file->mimetype = $img->mime();
        $file->extension = 'png';
        $file->filesize = $img->filesize();
        $file->height = $img->height();
        $file->width = $img->width();
        $file->download = 0;
        $path = storage_path('app/images/admin/avatar/');
        File::makeDirectory($path,$mode = 0777, true, true);
        //Guarda la imagen en la ruta especifica
        $img->save($file->route);
        return $file;

    }
}
