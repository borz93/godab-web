<?php

namespace App\Http\Controllers\Admin\Products;

use App\Analysis;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\File as FileModel;

use App\Subproduct;
use App\Product;
use App\Http\Requests;
use App\Http\Requests\SubproductsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SubproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        //$subproducts = Subproduct::paginate(6);
        return view('admin.products.subproductsList',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::lists('name', 'id');
        return view('admin.products.subproductCreate',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubproductsRequest $request)
    {
        $image = $request->file('image');     //Variable con la imagen recibida
        $file=$this->imageManipulate($image,$request->name);
        $file->save();
        $subproduct = new Subproduct($request->except(['image']));
        $subproduct->product_id= $request->product;
        $file->product()->save($subproduct);
        return redirect('admin/productos/lista-subproductos')->with('succesMessage','Subroducto: '.$subproduct->name.' creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $subproduct
     * @return \Illuminate\Http\Response
     */
    public function show($product,$subproduct)
    {
        $product = Product::findBySlugOrIdOrFail($product);
        $subproduct = Subproduct::findBySlugOrIdOrFail($subproduct);
        $analysis = Analysis::where('subproduct_id',$subproduct->id)->orderBy('created_at', 'DESC')->paginate(5);
        return view('front-end.analysis.subproduct',compact('product','subproduct','analysis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::lists('name', 'id');
        $subproduct = Subproduct::findOrFail($id);
        return view('admin.products.subproductEdit',compact('subproduct','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubproductsRequest $request, $id)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $subproductToUpdate =  Subproduct::findOrFail($id);
            $fileToUpdate = $subproductToUpdate->file;
            if(Storage::disk('local')->exists('images/products/subproducts_images/'.$fileToUpdate->name)){
                Storage::delete('images/products/subproducts_images/'.$fileToUpdate->name);
                $file=$this->imageManipulate($image,$request->name,$fileToUpdate);
                $file->update();
                $subproductToUpdate->update($request->except(['image']));
                return redirect('admin/productos/lista-subproductos')->with('editMessage','Subroducto: '.$subproductToUpdate->name.' editado!');
            }else{
                $subproductToUpdate->update($request->except(['image']));
                return redirect('admin/productos/lista-subproductos')->with('editMessage','Subroducto: '.$subproductToUpdate->name.' editado con errores al actualizar la imagen');
            }
        }else{
            $subproductToUpdate =  Subproduct::findOrFail($id);
            $subproductToUpdate->update($request->all());
            return redirect('admin/productos/lista-subproductos')->with('editMessage','Subroducto: '.$subproductToUpdate->name.' editado!');
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
        $subproductToDestroy = Subproduct::findOrFail($id);
        $file = $subproductToDestroy->file;
        if(Storage::disk('local')->exists('images/products/subproducts_images/'.$file->name)){
            Storage::delete('images/products/subproducts_images/'.$file->name);
            $file->delete($subproductToDestroy);
            return redirect('admin/productos/lista-subproductos')->with('deleteMessage','Subproducto eliminado!');
        }else
        {
            $file->delete($subproductToDestroy);
            return redirect('admin/productos/lista-subproductos')->with('deleteMessage','Subproducto eliminado con error al borrar la imagen!');
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
        $file->name = camel_case($fileName) . '_subproduct.png';
        $file->route = storage_path('app/images/products/subproducts_images/'. $file->name);
        $file->mimetype = $img->mime();
        $file->extension = $image->getClientOriginalExtension();
        $file->filesize = $img->filesize();
        $file->height = $img->height();
        $file->width = $img->width();
        $file->download = 0;
        $path = storage_path('app/images/products/subproducts_images/');
        File::makeDirectory($path,$mode = 0777, true, true);
        //Guarda la imagen en la ruta especifica
        $img->save($file->route);
        return $file;
    }
}
