<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NavbarController extends Controller
{
    public function products()
    {
        $products = Product::get();
        return $products;
    }


}
