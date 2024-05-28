<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paymets;
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

    public function printpdf()
    {
        // Mengambil data pembayaran dari database
        $payments = Paymets::all();

        return view('bayar.report', compact('payments'));
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
