<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Deliveries;
use Illuminate\Http\Request;

class DeliveriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Deliveries::all();
        return view('deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $order_id = $request->query('order_id');
        $order = Orders::findOrFail($order_id);
        return view('deliveries.create', compact('order_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'shipping_date' => 'required|date',
            'status' => 'required',
        ]);

        $tracking_code = strtoupper(substr(md5(rand()), 0, 10));

        Deliveries::create([
            'order_id' => $request->order_id,
            'shipping_date' => $request->shipping_date,
            'tracking_code' => $tracking_code,
            'status' => $request->status,
        ]);

        return redirect()->route('deliveries.index')
            ->with('success', 'Delivery created successfully.');
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
        $delivery = Deliveries::findOrFail($id);
        return view('deliveries.edit', compact('delivery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'required',
            'shipping_date' => 'required|date',
            'tracking_code' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $delivery = Deliveries::findOrFail($id);
        $delivery->update($request->all());

        return redirect()->route('deliveries.index')->with('status', 'Delivery updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delivery = Deliveries::find($id);

        if ($delivery) {
            $delivery->delete();
            return redirect()->route('deliveries.index')->with('status', 'Delivery deleted successfully');
        } else {
            return redirect()->route('deliveries.index')->with('status', 'Delivery not found');
        }
    }

}
