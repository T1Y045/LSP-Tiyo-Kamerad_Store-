<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\Paymets;
use App\Models\Customers;
use App\Models\Wishlist;
use App\Models\Productreview;




class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.home");
    }



    public function chart()
    {
        // Ambil data order per bulan
        $orders = Orders::selectRaw('MONTH(order_date) as month, COUNT(*) as count')
                       ->groupBy('month')
                       ->pluck('count', 'month')->toArray();
    
        // Ambil data payment per bulan
        $payments = Paymets::selectRaw('MONTH(payment_date) as month, SUM(amount) as total')
                           ->groupBy('month')
                           ->pluck('total', 'month')->toArray();
    
        // Hitung total income keseluruhan
        $totalIncome = Paymets::sum('amount');
    
        // Format data untuk Chart.js
        $months = range(1, 12);
        $orderData = [];
        $paymentData = [];
    
        foreach ($months as $month) {
            $orderData[] = $orders[$month] ?? 0;
            $paymentData[] = $payments[$month] ?? 0;
        }

        $perPage = 3; // Jumlah data per halaman
        $customers = Customers::paginate($perPage); // Mengambil data customer dengan paginasi
    
        $wishlist = Wishlist::all();
        $review = Productreview::all();

    
        // Mengirim data ke view
        return view('dashboard.home', compact('orderData', 'paymentData', 'totalIncome', 'customers', 'wishlist', 'review'));
    }
    

    public function logout()
    {
        Auth::logout(); 
        session()->invalidate(); 
        session()->regenerateToken(); 
    
        return redirect()->route('login')->with('success', 'Berhasil logout'); // Redirect ke halaman login
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
    public function destroy(string $id)
    {
        //
    }
}
