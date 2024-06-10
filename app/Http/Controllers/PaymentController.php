<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paymets;
use Illuminate\Support\Facades\View;
use App\Models\purchaseorderitems;
use App\Models\purchaseorder;

use Dompdf\Dompdf;
use Dompdf\Options;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Paymets::all();
        return view('bayar.index', compact('payments'));
    }

    public function generatePDF(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');
    
        $paymentsQuery = Paymets::query();
        if ($year && $month) {
            $paymentsQuery->whereYear('payment_date', $year)->whereMonth('payment_date', $month);
        }
        $payments = $paymentsQuery->get();
    
        $purchaseOrdersQuery = PurchaseOrderItems::query();
        if ($year && $month) {
            $purchaseOrdersQuery->whereYear('created_at', $year)->whereMonth('created_at', $month);
        }
        $purchaseOrders = $purchaseOrdersQuery->get();
    
        // Calculate total purchase amount
        $purchaseTotal = 0;
        foreach ($purchaseOrders as $purchaseOrder) {
            $purchaseTotal += $purchaseOrder->price * $purchaseOrder->quantity;
        }
    
        // Load view
        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('bayar.pdf', compact('payments', 'purchaseOrders', 'purchaseTotal')));
    
        // (Optional) Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');
    
        // Render PDF (optional, depends on your needs)
        $pdf->render();
    
        // Output PDF to browser
        return $pdf->stream('payments.pdf');
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
        $payment = Paymets::findOrFail($id);
        $payment->delete();

        return redirect()->route('bayar.index')->with('status', 'Data payment berhasil dihapus.');
    }

}
