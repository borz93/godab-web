<?php

namespace App\Http\Controllers\Admin\Products;

use App\Product;
use App\Subproduct;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\File as FileModel;

use App\Http\Requests;
use App\Http\Requests\ProductsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view('admin.products.productsList',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.productCreate');
    }

    /**
     * @param ProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductsRequest $request)
    {
        $image = $request->file('image');     //Variable con la imagen recibida
        $file=$this->imageManipulate($image,$request->name);
        $file->save();
        $product = new Product($request->except(['image']));
        $file->product()->save($product);
        return redirect('admin/productos/lista-productos')->with('succesMessage','Producto: '.$product->name.' creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        $product = Product::findBySlugOrId($product);
        return view('front-end.analysis.product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.productEdit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, $id)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $productToUpdate =  Product::findOrFail($id);
            $fileToUpdate = $productToUpdate->file;
            if(Storage::disk('local')->exists('images/products/products_images/'.$fileToUpdate->name)){
                Storage::delete('images/products/products_images/'.$fileToUpdate->name);
                $file=$this->imageManipulate($image,$request->name,$fileToUpdate);
                $file->update();
                $productToUpdate->update($request->except(['image']));
                return redirect('admin/productos/lista-productos')->with('editMessage','Producto: '.$productToUpdate->name.' editado!');
            }else
            {
                $productToUpdate->update($request->except(['image']));
                return redirect('admin/productos/lista-productos')->with('editMessage','Producto: '.$productToUpdate->name.' editado con errores al actualizar la imagen');
            }
        }else
        {
            $productToUpdate =  Product::findOrFail($id);
            $productToUpdate->update($request->all());
            return redirect('admin/productos/lista-productos')->with('editMessage','Producto: '.$productToUpdate->name.' editado!');
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
        $productToDestroy = Product::findOrFail($id);
        $file = $productToDestroy->file;
        if(Storage::disk('local')->exists('images/products/products_images/'.$file->name))
        {
            Storage::delete('images/products/products_images/'.$file->name);
            $file->delete($productToDestroy);
            return redirect('admin/productos/lista-productos')->with('deleteMessage','Producto eliminado!');
        }else
        {
            $file->delete($productToDestroy);
            return redirect('admin/productos/lista-productos')->with('deleteMessage','Producto eliminado con error al borrar la imagen!');
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
        $img->resize(500, 300, function () {
        });
        $file->name = camel_case($fileName) . '_product.png';
        $file->route = storage_path('app/images/products/products_images/'). $file->name;
        $file->mimetype = $img->mime();
        $file->extension = $image->getClientOriginalExtension();
        $file->filesize = $img->filesize();
        $file->height = $img->height();
        $file->width = $img->width();
        $file->download = 0;
        $path = storage_path('app/images/products/products_images/');
        File::makeDirectory($path,$mode = 0777, true, true);
        //Guarda la imagen en la ruta especifica
        $img->save($file->route);
        return $file;
    }
}
