<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("users.index", [
            'users' => User::all()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:255',
            'roles' => 'required|in:admin,owner',
            'aktif' => 'required|boolean',
        ]);
    
        // Simpan data ke database
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'roles' => $request->roles,
            'aktif' => $request->aktif,
        ]);
    
        // Redirect dengan pesan berhasil
        $decodedUser = html_entity_decode($newUser->name);
        return redirect()->route('users.index')->with('success', 'New User "' . $decodedUser . '" has been created successfully.');
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
        //get post by ID
        $users = User::findOrFail($id);

        //render view with post
        return view('users.edit', compact('users'));
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
            'password' => 'required|string|min:8|max:255',
            'roles' => 'required|in:admin,owner',
            'aktif' => 'required|in:active,not active',
        ]);

        // Cari user berdasarkan ID
        $users = User::findOrFail($id);

        // Update data user
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->roles = $request->roles;
        $users->aktif = $request->aktif === 'active' ? 1 : 0;

        // Simpan perubahan
        $users->save();

        // Redirect dengan pesan berhasil
        return redirect()->route('users.index')->with('success', 'User "' . $users->name . '" has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $name = User::find($id);
    
        // Jika data tidak ditemukan, kembalikan response dengan pesan error
        if (!$name) {
            return redirect()->route('users.index')->with('error', 'Name User Discount not found.');
        }
    
        // Hapus data
        $name->delete();
    
        // Redirect dengan pesan berhasil
        return redirect()->route('users.index')->with('success', 'Name User "' . $name->name . '" has been deleted successfully.');
    }
}