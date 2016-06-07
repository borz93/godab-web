<?php

namespace App\Http\Controllers\Admin;
use App\Analysis;
use App\NutritionalInfo;
use App\NutritionalInfoData;
use App\Product;
use App\Subproduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests\AnalysisRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\File as FileModel;
use App\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class AnalysisController extends Controller
{
    public function index()
    {
        $analysis = Analysis::orderBy('created_at','DESC')->paginate(10);
        Notification::readAllNotifications('analysis');
        return view('admin.analysis.analysisList',compact('analysis'));
    }

    public function create()
    {
        $products = Product::lists('name', 'id');
        return view('admin.analysis.analysisCreate',compact('products'));
    }

    public function store(AnalysisRequest $request)
    {
        $image = $request->file('image');     //Variable con la imagen recibida
        $file = $this->imageManipulate($image,$request->title);
        $analysis = new Analysis($request->except(['image','nutritional_info_name','nutritional_info_quantity_x','nutritional_info_quantity_y']));
        $analysis->user_id = Auth::user()->id;
        Notification::makeNotification('analysis','Tienes análisis nuevos','admin/lista-analisis');
        $file->save();
        $file->analysis()->save($analysis);
        $nutritional_info = new NutritionalInfo();
        $nutritional_info->name = 'Información nutricional de: '.$request->title;
        $analysis->nutritionalInfo()->save($nutritional_info);
        for($i =0; count($request->nutritional_info_name)>$i;$i++)
        {
           $data = new NutritionalInfoData;
            $data->name=$request->nutritional_info_name[$i];
            $data->quantity_x=$request->nutritional_info_quantity_x[$i];
            $data->quantity_y=$request->nutritional_info_quantity_y[$i];
            $nutritional_info->nutritionalInfoDatas()->save($data);
        }
        return redirect('admin/lista-analisis')->with('succesMessage','Análisis: '.$analysis->title.' creado!');

    }

    public function storeNutritionalInfo(Request $request,$id)
    {
        $nutritionalInfoData = new NutritionalInfoData($request->all());
        $nutritional_info = NutritionalInfo::findOrFail($id);
        $nutritional_info->nutritionalInfoDatas()->save($nutritionalInfoData);
        return redirect()->back()->with('succesMessage','Datos creados!');
    }

    public function edit($id)
    {
        $analysis = Analysis::findOrFail($id);
        $products = Product::lists('name', 'id');
        return view('admin.analysis.analysisEdit',compact('analysis','products'));
    }

//    public function show($product,$subproduct,$analysi)
//    {
//    }

    public function editNutritionalInfo($id)
    {
        $nutritionalInfo = NutritionalInfo::findOrFail($id);
        return view('admin.analysis.nutritionalInfoEdit',compact('nutritionalInfo'));
    }

    public function update(AnalysisRequest $request, $id)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $analysisToUpdate =  Analysis::findOrFail($id);
            $fileToUpdate = $analysisToUpdate->file;
            if(Storage::disk('local')->exists('images/analysis_images/'.$fileToUpdate->name)){
                Storage::delete('images/analysis_images/'.$fileToUpdate->name);
                $file=$this->imageManipulate($image,$request->title,$fileToUpdate);
                $file->update();
                $analysisToUpdate->update($request->except(['image','product']));
                return redirect('admin/lista-analisis')->with('editMessage','Análisis: '.$analysisToUpdate->title.' editado!');
            }else
            {
                $analysisToUpdate->update($request->except(['image','product']));
                return redirect('admin/lista-analisis')->with('editMessage','Análisis: '.$analysisToUpdate->title.' editado con errores al actualizar la imagen');
            }
        }else
        {
            $analysisToUpdate =  Analysis::findOrFail($id);
            $analysisToUpdate->update($request->all());
            return redirect('admin/lista-analisis')->with('editMessage','Análisis: '.$analysisToUpdate->title.' editado!');
        }
    }

    public function updateNutritionalInfo(Request $request, $id)
    {
        $nutritional_info_data = NutritionalInfoData::findOrFail($id);
        $nutritional_info_data->update($request->all());
        return redirect()->back()->with('editMessage','Datos editados!');
    }

    public function destroy($id)
    {
        $analysisToDestroy = Analysis::findOrFail($id);
        $file = $analysisToDestroy->file;
        if(Storage::disk('local')->exists('images/analysis_images/'.$file->name))
        {
            Storage::delete('images/analysis_images/'.$file->name);
            $file->delete($analysisToDestroy);
            return redirect('admin/lista-analisis')->with('deleteMessage','Análisis eliminado!');
        }else
        {
            $file->delete($analysisToDestroy);
            return redirect('admin/lista-analisis')->with('deleteMessage','Análisis eliminado con error al borrar la imagen!');
        }

    }

    public function destroyNutritionalInfo($id)
    {
        $nutritionalInfoToDestroy = NutritionalInfoData::findOrFail($id);
        $nutritionalInfoToDestroy->delete();
        return redirect()->back()->with('deleteMessage','Datos eliminados!');
    }

    public function searchSubproduct($id)
    {
        $subproducts = Subproduct::where('product_id', $id)->get();
        return $subproducts;
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
        $file->name = str_slug($fileName,'-') . '_analysis.png';
        $file->route = storage_path('app/images/analysis_images/'). $file->name;
        $file->mimetype = $img->mime();
        $file->extension = 'png';
        $file->filesize = $img->filesize();
        $file->height = $img->height();
        $file->width = $img->width();
        $file->download = 0;
        $path = storage_path('app/images/analysis_images/');
        File::makeDirectory($path,$mode = 0777, true, true);
        //Guarda la imagen en la ruta especifica
        $img->save($file->route);
        return $file;

    }
}
