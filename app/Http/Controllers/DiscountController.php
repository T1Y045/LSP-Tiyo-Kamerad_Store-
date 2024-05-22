<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discounts;
use App\Models\Discountcategories;
use App\Models\Products;


class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discounts::join('discountcategories', 'discounts.category_discount_id', '=', 'discountcategories.id')
                               ->join('products', 'discounts.product_id', '=', 'products.id')
                               ->select('discounts.*', 'discountcategories.category_name', 'products.product_name')
                               ->get();
    
        return view("discounts.index", compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Products::all();
        $discountcategories = Discountcategories::all();
        return view('discounts.create', compact('product', 'discountcategories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'discount_category_id' => 'required|exists:discountcategories,id',
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'percentage' => ['required', 'integer', 'between:1,100'],
        ]);
    
        // Simpan data ke database
        $newDiscount = Discounts::create([
            'category_discount_id' => $request->discount_category_id,
            'product_id' => $request->product_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'percentage' => $request->percentage,
        ]);
    
        // Redirect dengan pesan berhasil 
        return redirect()->route('discounts.index')->with('success', 'Discount created successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $discount = Discounts::find($id);
        return view('discounts.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $discount = Discounts::find($id);
        $product = Products::all();
        $discountcategories = Discountcategories::all();
        
        return view('discounts.edit', compact('discount', 'product', 'discountcategories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'discount_category_id' => 'required|exists:discountcategories,id',
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'percentage' => ['required', 'integer', 'between:1,100'],
        ]);
    
        // Temukan data berdasarkan ID
        $discounts = Discounts::find($id);
    
        // Jika data tidak ditemukan, kembalikan response dengan pesan error
        if (!$discounts) {
            return redirect()->route('discounts.index')->with('error', 'Discount not found.');
        }
    
        // Update data
        $discounts->category_discount_id = $request->discount_category_id;
        $discounts->product_id = $request->product_id;
        $discounts->start_date = $request->start_date;
        $discounts->end_date = $request->end_date;
        $discounts->percentage = $request->percentage;
        $discounts->save();
    
        // Redirect dengan pesan berhasil
        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the discount by ID
        $discount = Discounts::find($id);
    
        // If the discount is not found, return with an error message
        if (!$discount) {
            return redirect()->route('discounts.index')->with('error', 'Discount not found.');
        }
    
        // Delete the discount
        $discount->delete();
    
        // Redirect with a success message
        return redirect()->route('discounts.index')->with('success', 'Discount has been deleted successfully.');
    }

    
}

