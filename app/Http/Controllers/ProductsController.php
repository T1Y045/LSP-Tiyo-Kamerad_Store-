<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Productcategories;

class ProductsController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Products::join('productcategories', 'products.product_category_id', '=', 'productcategories.id')
            ->select('products.*', 'productcategories.category_name')
            ->get();

        return view("products.index", compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productcategories = Productcategories::all();
        return view('products.create', compact('productcategories'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_category_id' => 'required|exists:productcategories,id',
            'product_name' => 'required|string|max:100|unique:products,product_name',
            'description' => 'required|string',
            'price' => 'required|integer',
            'stok_quantity' => 'required|integer',
            'image1_url' => 'nullable|image|max:20048',
            'image2_url' => 'nullable|image|max:20048',
            'image3_url' => 'nullable|image|max:20048',
            'image4_url' => 'nullable|image|max:20048',
            'image5_url' => 'nullable|image|max:20048',
        ], [
            'product_category_id.required' => 'Product Category is required.',
            'image5_url.max' => 'The image size cannot exceed 20MB.',
        ]);
        
        
        // Simpan gambar
        $imagePaths = [];
            for ($i = 1; $i <= 5; $i++) {
                if ($request->hasFile('image'.$i.'_url')) {
                    $image = $request->file('image'.$i.'_url');
                    $imageName = 'products_' . $i . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('storage/products'), $imageName);
                    $imagePaths['image'.$i.'_url'] = 'storage/products/' . $imageName;
                } else {
                // Jika gambar tidak diupload, atur nilai default kosong untuk kolom gambar yang bersangkutan
                    $imagePaths['image'.$i.'_url'] = '';
                }
            }

            // Gabungkan path gambar dengan request data
            $requestData = $request->except(['_token', '_method']);
            $requestData = array_merge($requestData, $imagePaths);

            // Simpan data produk
            Products::create($requestData);

            // Setelah penyimpanan berhasil, arahkan pengguna kembali ke halaman indeks produk
            return redirect('products.index')->with('success', 'Product added successfully.');
        
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
    public function edit(Products $product)
    {
        $productcategories = Productcategories::all();
        return view('products.edit', compact('product', 'productcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $rules = [
            'product_category_id' => 'required|exists:productcategories,id',
            'product_name' => 'required|string|max:100|unique:products,product_name,'.$product->id,
            'description' => 'required|string',
            'price' => 'required|integer',
            'stok_quantity' => 'required|integer',
        ];
    
        // Tambahkan validasi untuk setiap kolom gambar yang diunggah
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("image{$i}_url")) {
                $rules["image{$i}_url"] = 'image|max:20048';
            }
        }
    
        $request->validate($rules);
    
        // Update data produk
        $product->update([
            'product_category_id' => $request->product_category_id,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stok_quantity' => $request->stok_quantity,
        ]);
    
        // Simpan gambar-gambar baru
        $imagePaths = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("image{$i}_url")) {
                $image = $request->file("image{$i}_url");
                $imageName = 'products_' . $i . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/products'), $imageName);
                $imagePaths["image{$i}_url"] = 'storage/products/' . $imageName;
            } else {
                // Jika gambar tidak diupload, atur nilai default kosong untuk kolom gambar yang bersangkutan
                $imagePaths["image{$i}_url"] = $product->{"image{$i}_url"};
            }
        }
    
        // Simpan path foto baru ke dalam model
        $product->update($imagePaths);
    
        // Redirect dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $product = Products::find($id);
    
        // Jika data tidak ditemukan, kembalikan response dengan pesan error
        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Name Products Discount not found.');
        }
    
        // Hapus data
        $product->delete();
    
        // Redirect dengan pesan berhasil
        return redirect()->route('product.index')->with('success', 'Name Products "' . $product->product_name . '" has been deleted successfully.');
    }
}
