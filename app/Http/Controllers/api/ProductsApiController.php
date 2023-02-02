<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    function index(){
        $products = Product::with(['category','size','color'])->get();
        return response()->json($products);
    }
}
