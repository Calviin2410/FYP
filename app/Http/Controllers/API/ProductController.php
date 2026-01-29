<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        $products->transform(function ($product) {
            $product->image = url($product->image);
            return $product;
        });

        return response()->json($products);
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        $product->image = url($product->image);
            
        return response()->json($product);
    }
}
