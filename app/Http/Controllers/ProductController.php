<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data = $request->all();
        $data['image'] = 'images/' . $imageName;
        $category = Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        
        return view('product.update', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data = $request->all();
        $data['image'] = 'images/' . $imageName;

        $product = Product::findOrFail($id);

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        $product->delete();

        return response()->json(['success' => 'Product deleted successfully.']);
    }

    public function export()
    {
        $user = User::all();

        return (new FastExcel($user))->download('user.xlsx');
    }
}
