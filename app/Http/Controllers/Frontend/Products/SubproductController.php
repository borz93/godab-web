<?php

namespace App\Http\Controllers\Frontend\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Subproduct;
use App\Product;
use App\Analysis;

use App\Http\Requests;

class SubproductController extends Controller
{
    public function show($product,$subproduct)
    {
        $subproduct = Subproduct::findBySlugOrIdOrFail($subproduct);
        $analysis = $subproduct->analysis()->orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.analysis.subproduct',compact('subproduct','analysis'));
    }
}
