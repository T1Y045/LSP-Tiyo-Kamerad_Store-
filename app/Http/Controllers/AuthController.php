<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'phone' => 'required',
                'address1' => 'required',
                'address2' => 'nullable',
                'address3' => 'nullable',
            ]);

            Customers::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'phone' => $validatedData['phone'],
                'address1' => $validatedData['address1'],
                'address2' => $validatedData['address2'],
                'address3' => $validatedData['address3'],
            ]);

            return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/dashboard');
        } elseif (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return redirect()->route('login')->with('error', 'Email or Password is wrong.');
        }
    }

    

    public function logout()
    {
        Auth::logout(); 
        session()->invalidate(); 
        session()->regenerateToken(); 
    
        return redirect()->route('login')->with('success', 'Berhasil logout'); // Redirect ke halaman login
    }

    public function profile()
    {
        // Mengambil data pelanggan yang sedang login
        $customer = Auth::guard('customer')->user();

        // Memastikan $customer tidak null
        if (!$customer) {
            return redirect()->route('landing.index'); // Atau rute lain untuk pelanggan yang tidak terautentikasi
        }

        // Mengirim data pelanggan ke tampilan
        return view('landing.profile', compact('customer'));
    }





    // Metode lain di dalam controller




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
