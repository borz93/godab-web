<?php

namespace App\Http\Controllers\Frontend\Products;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;

class ProductController extends Controller
{
    public function show($product)
    {
        $product = Product::findBySlugOrIdOrFail($product);
        return view('frontend.analysis.product',compact('product'));
    }
}
