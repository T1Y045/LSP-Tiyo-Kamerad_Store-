<?php

namespace App\Http\Controllers;

use App\Models\Discountcategories;
use Illuminate\Http\Request;

class DiscountcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('discount_categories.index',[
            'dc' => Discountcategories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('discount_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:discountcategories',
        ]);

        Discountcategories::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('discount_categories.index')->with([
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
        $category = Discountcategories::find($id);
        
        if (!$category) {
            return redirect()->route('discount_categories.index')->with([
                'status' => 'error',
                'pesan' => 'Category not found.',
            ]);
        }

        return view('discount_categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $discount = Discountcategories::find($id);
        
        if (!$discount) {
            return redirect()->route('discount_categories.index')->with([
                'status' => 'error',
                'pesan' => 'discount not found.',
            ]);
        }

        $discount->update($request->only(['category_name']));

        return redirect()->route('discount_categories.index')->with([
            'status' => 'edit',
            'pesan' => 'Category with ID ' . $id . ' has been updated.',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discount = Discountcategories::find($id);
        
        if (!$discount) {
            return redirect()->route('discount_categories.index')->with([
                'status' => 'error',
                'pesan' => 'Category not found.',
            ]);
        }

        $discount->delete();

        return redirect()->route('discount_categories.index')->with([
            'status' => 'delete',
            'pesan' => 'Category with ID ' . $id . ' has been deleted.',
        ]);
    }
}
