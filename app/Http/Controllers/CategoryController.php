<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\CreateCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data = $request->all();
        $data['image'] = 'images/' . $imageName;
        $category = Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        
        return view('category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data = $request->all();
        $data['image'] = 'images/' . $imageName;

        $category = Category::findOrFail($id);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json(['success' => 'Category deleted successfully.']);
    }

    public function export()
    {
        $categories = Category::all();

        return (new FastExcel($categories))->download('category.xlsx');
    }
}
