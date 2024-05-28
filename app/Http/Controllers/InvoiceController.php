<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\Orderdetails;
use App\Models\Deliveries;
use App\Models\Paymets;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function show()
    {
        $customer = Auth::guard('customer')->user();

        // Pastikan customer tidak null
        if ($customer) {
            $orders = Orders::where('customer_id', $customer->id)
                ->with(['orderdetails.product', 'delivery'])
                ->get();
            $payments = Paymets::whereIn('order_id', $orders->pluck('id'))->get();

            return view('landing.invoice', compact('orders', 'payments'));
        } else {
            return redirect()->route('login');
        }
    }

    public function cancelOrder($orderId)
    {
        $order = Orders::findOrFail($orderId);
    
        // Hapus detail pesanan terkait
        $order->orderdetails()->delete();
    
        // Hapus pengiriman terkait
        $order->delivery()->delete();
    
        // Hapus pembayaran yang terkait
        Paymets::where('order_id', $orderId)->delete();
    
        // Hapus pesanan
        $order->delete();
    
        return redirect()->route('landing.invoice')->with('success', 'Order successfully canceled.');
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
    public function destroy(string $id)
    {
        //
    }
}
