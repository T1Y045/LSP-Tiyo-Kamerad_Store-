<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\purchaseorder;
use App\Models\purchaseorderitems;
use App\Models\Products;


use Illuminate\Support\Facades\DB;
class PurchaseorderitmesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data dari view purchase_orders_view
        $purchaseOrders = DB::table('PurchaseOrderDetails_view')->get();

        // Mengirim data ke view untuk ditampilkan
        return view('purchase_item.index', compact('purchaseOrders'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Products::all();
        $purchaseOrders = PurchaseOrder::all();
        return view('purchase_item.create', compact('products', 'purchaseOrders'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'purchase_order_id' => 'required|integer|exists:purchaseorders,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);
    
        $purchaseOrderItem = purchaseorderitems::create($request->all());
    
        // Update the product's stock quantity
        $product = Products::findOrFail($request->product_id);
        $product->stok_quantity += $request->quantity;
        $product->save();
    
        return redirect()->route('purchase_item.index')->with('success', 'Purchase Order Item created successfully.');
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

     public function edit($id)
     {
         $purchaseOrderItem = purchaseorderitems::findOrFail($id);
         $products = Products::all();
         $purchaseOrders = PurchaseOrder::all();
         return view('purchase_item.edit', compact('purchaseOrderItem', 'products', 'purchaseOrders'));
     }
     
     public function update(Request $request, $id)
     {
         $request->validate([
             'purchase_order_id' => 'required|integer|exists:purchaseorders,id',
             'product_id' => 'required|integer|exists:products,id',
             'quantity' => 'required|integer|min:1',
             'price' => 'required|numeric|min:0',
         ]);
     
         $purchaseOrderItem = purchaseorderitems::findOrFail($id);
         
         // Retrieve the original quantity
         $originalQuantity = $purchaseOrderItem->quantity;
     
         // Update the purchase order item
         $purchaseOrderItem->update($request->all());
     
         // Calculate the difference in quantity
         $quantityDifference = $request->quantity - $originalQuantity;
     
         // Update the product's stock quantity
         $product = Products::findOrFail($request->product_id);
         $product->stok_quantity += $quantityDifference;
         $product->save();
     
         return redirect()->route('purchase_item.index')->with('success', 'Purchase Order Item updated successfully.');
     }



         public function destroy($id)
    {
        $purchaseOrderItem = purchaseorderitems::findOrFail($id);
        $purchaseOrderItem->delete();

        return redirect()->route('purchase_item.index')->with('success', 'Purchase Order Item deleted successfully.');
    }

}
