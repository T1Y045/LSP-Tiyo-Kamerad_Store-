<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Customers;
use App\Models\Orderdetails;

use Illuminate\Support\Facades\DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data dari view customer_orders_view
        $orders = Orders::from('customer_orders_view')->get();

        // Kirim data ke view order.index
        return view('orders.index', compact('orders'));
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
        //
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
        $order = Orders::findOrFail($id);
        return view('orders.edit', compact('order'));
    }
    
    public function update(Request $request, $id)
    {
        $order = Orders::findOrFail($id);
        $order->update($request->all());
    
        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Check if the order has related order details
        if (Orderdetails::where('order_id', $id)->exists()) {
            // Delete related order details first
            Orderdetails::where('order_id', $id)->delete();
        }
    
        // Now, delete the order
        $order = Orders::findOrFail($id);
        $order->delete();
    
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
    
    
}
