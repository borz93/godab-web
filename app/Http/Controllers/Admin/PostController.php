<?php

namespace App\Http\Controllers\Admin;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\File as FileModel;
use App\Notification;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(10);
        Notification::readAllNotifications('post');
        return view('admin.post.postsList',compact('posts'));
    }
    public function create()
    {
        return view('admin.post.postCreate');
    }
    public function store(PostsRequest $request){

        $image = $request->file('image');     //Variable con la imagen recibida
        $file=$this->imageManipulate($image,$request->title);
        $post = New Post($request->except(['image']));
        $post->user_id = Auth::user()->id;
        Notification::makeNotification('post','Hay noticias nuevas','admin/lista-noticias');
        $file->save();
        $file->post()->save($post);

        return redirect('admin/lista-noticias')->with('succesMessage','Noticia: '.$post->title.' creada!');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.postEdit',compact('post'));
    }
//    public function show($id)
//    {
//    }
    public function update(PostsRequest $request, $id)
    {
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $postToUpdate =  Post::findOrFail($id);
            $fileToUpdate = $postToUpdate->file;
            if(Storage::disk('local')->exists('images/posts_images/'.$fileToUpdate->name)){
                Storage::delete('images/posts_images/'.$fileToUpdate->name);
                $file=$this->imageManipulate($image,$request->title,$fileToUpdate);
                $file->update();
                $postToUpdate->update($request->except(['image']));
                return redirect('admin/lista-noticias')->with('editMessage','Noticia: '.$postToUpdate->title.' editada!');
            }else{
                $postToUpdate->update($request->except(['image']));
                return redirect('admin/lista-noticias')->with('editMessage','Noticia: '.$postToUpdate->title.' editada con errores al actualizar la imagen');
            }
        }else{
            $postToUpdate =  Post::findOrFail($id);
            $postToUpdate->update($request->all());
            return redirect('admin/lista-noticias')->with('editMessage','Noticia: '.$postToUpdate->title.' editada!');

        }
    }
    public function destroy($id)
    {
        $postToDestroy = Post::findOrFail($id);
        $file = $postToDestroy->file;
        if(Storage::disk('local')->exists('images/posts_images/'.$file->name))
        {
            Storage::delete('images/posts_images/'.$file->name);
            $file->delete($postToDestroy);
            return redirect('admin/lista-noticias')->with('deleteMessage','Noticia eliminada!');
        }else
        {
            $file->delete($postToDestroy);
            return redirect('admin/lista-noticias')->with('deleteMessage','Noticia eliminada con error al borrar la imagen!');
        }

    }

    /**
     * @param $image
     * @param $fileName
     * @param null $fileToUpdate
     * @return FileModel|null
     */
    private function imageManipulate($image,$fileName,$fileToUpdate = null )
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
        $file->name = str_slug($fileName,'-') . '_post.png';
        $file->route = storage_path('app/images/posts_images/'). $file->name;
        $file->mimetype = $img->mime();
        $file->extension = 'png';
        $file->filesize = $img->filesize();
        $file->height = $img->height();
        $file->width = $img->width();
        $file->download = 0;
        $path = storage_path('app/images/posts_images/');
        File::makeDirectory($path,$mode = 0777, true, true);
        //Guarda la imagen en la ruta especifica
        $img->save($file->route);
        return $file;

    }
}
