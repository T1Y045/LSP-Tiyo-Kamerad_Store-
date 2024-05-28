<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Customers;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlistItems = Wishlist::join('customers', 'wishlists.customer_id', '=', 'customers.id')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->select('wishlists.*', 'customers.name as customer_name', 'products.product_name as product_name')
            ->get();

        // Mengembalikan view dengan data wishlist
        return view('wishlist.index', compact('wishlistItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $wishlist = Wishlist::create([
            'customer_id' => Auth::guard('customer')->id(),
            'product_id' => $request->product_id,
        ]);

        return response()->json(['success' => true]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $wishlistItem = Wishlist::find($id);

    if (!$wishlistItem) {
        return response()->json(['success' => false, 'message' => 'Item not found'], 404);
    }

    $wishlistItem->delete();

    return response()->json(['success' => true]);
}

}
