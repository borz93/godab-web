<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Product;
use App\Notification;
use App\File as FileModel;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at','DESC')->paginate(10);
        Notification::readAllNotifications('article');
        return view('admin.articles.articlesList',compact('articles'));
    }

    public function create()
    {
        $products = Product::lists('name', 'id');
        return view('admin.articles.articleCreate',compact('products'));
    }

    public function store(ArticleRequest $request)
    {
        $image = $request->file('image');     //Variable con la imagen recibida
        $file = $this->imageManipulate($image,$request->title);
        $article = new Article($request->except(['image']));
        $article->user_id = Auth::user()->id;
        Notification::makeNotification('article','Hay artículos nuevos','admin/lista-articulos');
        $file->save();
        $file->article()->save($article);
        return redirect('admin/lista-articulos')->with('succesMessage','Artículo: '.$article->title.' creado!');

    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $products = Product::lists('name', 'id');
        return view('admin.articles.articleEdit',compact('article','products'));
    }

    public function update(ArticleRequest $request, $id)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $articleToUpdate =  Article::findOrFail($id);
            $fileToUpdate = $articleToUpdate->file;
            if(Storage::disk('local')->exists('images/articles_images/'.$fileToUpdate->name)){
                Storage::delete('images/articles_images/'.$fileToUpdate->name);
                $file=$this->imageManipulate($image,$request->title,$fileToUpdate);
                $file->update();
                $articleToUpdate->update($request->except(['image','product']));
                return redirect('admin/lista-articulos')->with('editMessage','Artículo: '.$articleToUpdate->title.' editado!');
            }else
            {
                $articleToUpdate->update($request->except(['image','product']));
                return redirect('admin/lista-articulos')->with('editMessage','Artículo: '.$articleToUpdate->title.' editado con errores al actualizar la imagen');
            }
        }else
        {
            $articleToUpdate =  Article::findOrFail($id);
            $articleToUpdate->update($request->all());
            return redirect('admin/lista-articulos')->with('editMessage','Artículo: '.$articleToUpdate->title.' editado!');
        }
    }

    public function destroy($id)
    {
        $articleToDestroy = Article::findOrFail($id);
        $file = $articleToDestroy->file;
        if(Storage::disk('local')->exists('images/articles_images/'.$file->name))
        {
            Storage::delete('images/articles_images/'.$file->name);
            $file->delete($articleToDestroy);
            return redirect('admin/lista-articulos')->with('deleteMessage','Artículo eliminado!');
        }else
        {
            $file->delete($articleToDestroy);
            return redirect('admin/lista-articulos')->with('deleteMessage','Artículo eliminado con error al borrar la imagen!');
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
        $img = $imageManager->make($image->getRealPath())
            ->encode('png')
            ->resize(intval(500), null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $file->name = str_slug($fileName,'-') . '_article.png';
        $file->route = storage_path('app/images/articles_images/'). $file->name;
        $file->mimetype = $img->mime();
        $file->extension = 'png';
        $file->filesize = $img->filesize();
        $file->height = $img->height();
        $file->width = $img->width();
        $file->download = 0;
        $path = storage_path('app/images/articles_images/');
        File::makeDirectory($path,$mode = 0777, true, true);
        //Guarda la imagen en la ruta especifica
        $img->save($file->route);
        return $file;

    }
}
