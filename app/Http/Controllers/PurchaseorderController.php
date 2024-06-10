<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\distributor;

use App\Models\purchaseorder;

use Illuminate\Support\Facades\DB;
class PurchaseorderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data dari view purchase_orders_view
        $purchaseOrders = DB::table('purchase_orders_view')->get();

        // Mengirim data ke view untuk ditampilkan
        return view('purchase_orders.index', compact('purchaseOrders'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $distributors = Distributor::all(); // Ganti dengan model dan nama tabel distributor yang sesuai
        return view('purchase_orders.create', compact('distributors'));
    
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'distributor_id' => 'required',
            'total_amount' => 'required',
            'status' => 'required',
        ]);

        // Simpan data ke dalam tabel PurchaseOrder
        PurchaseOrder::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('purchase.index')->with('success', 'Purchase Order created successfully.');
    }

    public function edit($id)
    {
        // Ambil data PurchaseOrder berdasarkan id
        $purchaseOrder = PurchaseOrder::findOrFail($id);
    
        // Ambil semua data distributor untuk dropdown
        $distributors = Distributor::all();
    
        // Tampilkan form edit dengan data PurchaseOrder dan Distributor yang diambil
        return view('purchase.edit', compact('purchaseOrder', 'distributors'));
    }
    

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'distributor_id' => 'required',
            'total_amount' => 'required',
            'status' => 'required',
        ]);

        // Update data PurchaseOrder berdasarkan id
        PurchaseOrder::findOrFail($id)->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('purchase.index')->with('success', 'Purchase Order updated successfully.');
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


    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari purchase order berdasarkan ID
        $purchaseOrder = PurchaseOrder::find($id);
    
        // Jika purchase order tidak ditemukan
        if (!$purchaseOrder) {
            return redirect()->route('purchase.index')->with('error', 'Purchase Order not found.');
        }
    
        try {
            // Hapus purchase order
            $purchaseOrder->delete();
    
            // Redirect dengan pesan sukses
            return redirect()->route('purchase.index')->with('success', 'Purchase Order deleted successfully.');
        } catch (\Exception $e) {
            // Tangani error jika terjadi
            return redirect()->route('purchase.index')->with('error', 'Error deleting Purchase Order: ' . $e->getMessage());
        }
    }
}
