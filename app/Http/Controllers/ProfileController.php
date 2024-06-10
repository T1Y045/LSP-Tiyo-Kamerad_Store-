<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Customers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the user's profile information.
     */



     public function update(Request $request)
     {
         $customer = Auth::guard('customer')->user();
     
         // Validasi data yang diperbarui
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:customers,email,'.$customer->id,
             'phone' => 'nullable|string|max:15',
             'address1' => 'nullable|string|max:255',
             'address2' => 'nullable|string|max:255',
             'address3' => 'nullable|string|max:255',
             'password' => 'nullable|string|min:8', // Tambahkan validasi untuk password baru
         ]);
     
         // Jika ada password baru yang disertakan, enkripsi password baru
         if (isset($validated['password'])) {
             $validated['password'] = Hash::make($validated['password']);
         }
     
         // Update data pelanggan
         $customer->update($validated);
     
         return redirect()->route('profile')->with('success', 'Profile updated successfully.');
     }
        

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
