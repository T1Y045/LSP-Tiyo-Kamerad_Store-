<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("customer.index", [
            'customer' => Customers::all()
        ]);
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
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:255', 
            'address1' => 'required',
            'address2' => 'required',
            'address3' => 'required',
        ]);
    
        // Cari customer berdasarkan ID
        $customer = Customers::findOrFail($id);
    
        // Update data customer
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password); // Hash the password
        $customer->phone = $request->phone;
        $customer->address1 = $request->address1;
        $customer->address2 = $request->address2;
        $customer->address3 = $request->address3;
    
        // Simpan perubahan
        $customer->save();
    
        // Redirect dengan pesan berhasil
        return redirect()->route('customer.index')->with('success', 'Customer "' . $customer->name . '" has been updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $name = Customers::find($id);
    
        // Jika data tidak ditemukan, kembalikan response dengan pesan error
        if (!$name) {
            return redirect()->route('customer.index')->with('error', 'Name Customer not found.');
        }
    
        // Hapus data
        $name->delete();
    
        // Redirect dengan pesan berhasil
        return redirect()->route('customer.index')->with('success', 'Name User "' . $name->name . '" has been deleted successfully.');
    }
}
