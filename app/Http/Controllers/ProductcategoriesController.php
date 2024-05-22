<?php

namespace App\Http\Controllers;

use App\Models\Productcategories;
use Illuminate\Http\Request;

class ProductcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product_categories.index',[
            'pc' => Productcategories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:productcategories',
        ]);

        Productcategories::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('product_categories.index')->with([
            'status' => 'success',
            'message' => 'The new category with name "' . $request->category_name . '" has been created.',
        ]);
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
        $category = Productcategories::find($id);
        
        if (!$category) {
            return redirect()->route('product_categories.index')->with([
                'status' => 'error',
                'pesan' => 'Category not found.',
            ]);
        }

        return view('product_categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Productcategories::find($id);
        
        if (!$category) {
            return redirect()->route('product_categories.index')->with([
                'status' => 'error',
                'pesan' => 'Category not found.',
            ]);
        }

        $category->update($request->only(['category_name']));

        return redirect()->route('product_categories.index')->with([
            'status' => 'edit',
            'pesan' => 'Category with ID ' . $id . ' has been updated.',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Productcategories::find($id);
        
        if (!$category) {
            return redirect()->route('product_categories.index')->with([
                'status' => 'error',
                'pesan' => 'Category not found.',
            ]);
        }
    
        // Delete associated products
        $category->products()->delete();
    
        // Then delete the category
        $category->delete();
    
        return redirect()->route('product_categories.index')->with([
            'status' => 'delete',
            'pesan' => 'Category with ID ' . $id . ' and its associated products have been deleted.',
        ]);
    }
    
}
