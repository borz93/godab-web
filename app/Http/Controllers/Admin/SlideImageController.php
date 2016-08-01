<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SlideImage;
use Intervention\Image\ImageManagerStatic as Image;
use App\File as FileModel;
use App\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class SlideImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide_images = SlideImage::orderBy('created_at', 'DESC')->get();
        Notification::readAllNotifications('slide_images');
        return view('admin.slider.slideImagesList', compact('slide_images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.slideImageCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');     //Variable con la imagen recibida
        $file = $this->imageManipulate($image,$request->name);
        $slide_image = new SlideImage($request->except('image'));
        Notification::makeNotification('slide_image','Tienes slides nuevos','admin/lista-slides');
        $file->save();
        $file->slide()->save($slide_image);
        return redirect('admin/lista-slides')->with('succesMessage','Slide: '.$slide_image->name.' creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide_image = SlideImage::findOrFail($id);
        return view('admin.slider.slideImageEdit',compact('slide_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $slideToUpdate =  SlideImage::findOrFail($id);
            $fileToUpdate = $slideToUpdate->file;
            if(Storage::disk('public')->exists('slider_images/'.$fileToUpdate->name)){
                Storage::disk('public')->delete('slider_images/'.$fileToUpdate->name);
                $file=$this->imageManipulate($image,$request->name,$fileToUpdate);
                $file->update();
                $slideToUpdate->update($request->except(['image']));
                return redirect('admin/lista-slides')->with('editMessage','Slide: '.$slideToUpdate->name.' editado!');
            }else
            {
                $slideToUpdate->update($request->except(['image']));
                return redirect('admin/lista-slides')->with('editMessage','Slide: '.$slideToUpdate->name.' editado con errores al actualizar la imagen');
            }
        }else
        {
            $slideToUpdate =  SlideImage::findOrFail($id);
            $slideToUpdate->update($request->except(['image']));
            return redirect('admin/lista-slides')->with('editMessage','Slide: '.$slideToUpdate->name.' editado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slideToDestroy = SlideImage::findOrFail($id);
        $file = $slideToDestroy->file;
        if (Storage::disk('public')->exists('slider_images/'.$file->name)) {
            Storage::disk('public')->delete('slider_images/'.$file->name);
            $file->delete($slideToDestroy);
            return redirect('admin/lista-slides')->with('deleteMessage', 'Slide eliminado!');
        } else {
            $file->delete($slideToDestroy);
            return redirect('admin/lista-slides')->with('deleteMessage', 'Slide eliminado con error al borrar la imagen!');
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
            ->resize(1200, 500, function () {
            });
        $file->name = str_slug($fileName,'-') . '_slider.png';
        $file->route = public_path('/images/slider_images/'. $file->name);
        $file->mimetype = $img->mime();
        $file->extension = 'png';
        $file->filesize = $img->filesize();
        $file->height = $img->height();
        $file->width = $img->width();
        $file->download = 0;
        $path = public_path('/images/slider_images/');
        File::makeDirectory($path,$mode = 0777, true, true);
        //Guarda la imagen en la ruta especifica
        $img->save($file->route);
        return $file;
    }
}
