<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productreview;
use App\Models\Products;
use App\Models\Customers;
use App\Models\Paymets;
use App\Models\Orders;
use App\Models\Orderdetails;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil data produk beserta diskon
        $productsQuery = Products::with('discount');
    
        // Logika untuk menyortir berdasarkan harga terendah atau tertinggi
        if ($request->sort == 'asc') {
            $productsQuery->orderBy('price');
        } elseif ($request->sort == 'desc') {
            $productsQuery->orderByDesc('price');
        }
    
        $products = $productsQuery->paginate(6);
    
        // Ambil data wishlist
        $wishlistitems = Wishlist::with('product')
                                 ->where('customer_id', Auth::guard('customer')->id())
                                 ->get();
    
        return view("landing.index", compact('products', 'wishlistitems'));
    }
    
    
    public function about()
    {
        return view("landing.about");
    }

    public function contact()
    {
        return view("landing.contact");
    }

    public function video()
    {
        return view("landing.video");
    }

    public function getWishlist()
    {
    $wishlistItems = Wishlist::with('product')
                             ->where('customer_id', Auth::guard('customer')->id())
                             ->get();

    return response()->json($wishlistItems);
    }


    



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    

    public function addToCart(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity', 1);
    
        $cart = Session::get('cart', []);
    
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $product = Products::with('discount')->find($productId);
            if ($product) {
                $discountedPrice = $product->price;
                if ($product->discount) {
                    $discountedPrice = $product->price - ($product->price * ($product->discount->percentage / 100));
                }
                $cart[$productId] = [
                    "name" => $product->product_name,
                    "quantity" => $quantity,
                    "price" => $discountedPrice,
                    "image" => $product->image1_url,
                    "discount" => $product->discount ? $product->discount->percentage : null
                ];
            }
        }
    
        Session::put('cart', $cart);
        return response()->json(['status' => 'success', 'cart' => $cart]);
    }
            

    public function getCart()
    {
        $cart = Session::get('cart', []);
        return response()->json(['cart' => $cart]);
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('productId');
        $cart = Session::get('cart', []);
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        Session::put('cart', $cart);
        return response()->json(['status' => 'success', 'cart' => $cart]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productId' => 'required|exists:products,id',
            'reviewText' => 'required',
            'rating' => 'required|integer|between:1,5'
        ]);
    
        if (Auth::guard('customer')->check()) {
            $review = new Productreview();
            $review->customer_id = Auth::guard('customer')->user()->id;
            $review->product_id = $validatedData['productId'];
            $review->comment = $validatedData['reviewText'];
            $review->rating = $validatedData['rating'];
            $review->save();
    
            return redirect()->back()->with('success', 'Review submitted successfully');
        } else {
            return redirect()->back()->with('error', 'You must be logged in to submit a review');
        }
    }

    public function coremove($id)
    {
        $review = ProductReview::findOrFail($id);

        if (Auth::guard('customer')->check() && Auth::guard('customer')->user()->id === $review->customer_id) {
            $review->delete();
            return redirect()->back()->with('success', 'Review deleted successfully');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this review');
        }
    }


    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menggunakan Eloquent untuk melakukan join antara Products dan Productcategories
        $pd = Products::with('category')->find($id);
        
        if (!$pd) {
            abort(404); // Jika produk tidak ditemukan, tampilkan halaman 404
        }
    
        $reviews = ProductReview::where('product_id', $id)->get();
    
        foreach ($reviews as $review) {
            $customer = Customers::find($review->customer_id);
            $review->customer_name = $customer ? $customer->name : 'Unknown';
        }
    
        // Kirim data produk, kategori, dan ulasan-ulasannya ke view
        return view('landing.product_detail', compact('pd', 'reviews'));
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



    public function checkout(Request $request)
    {
        // Ensure user is logged in
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('landing.index')->with('error', 'You must be logged in to checkout.');
        }
    
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }
    
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
    
        // Calculate shipping cost
        $shippingCost = 0;
        switch ($request->input('shipping_method')) {
            case 'standard':
                $shippingCost = 20000;
                break;
            case 'express':
                $shippingCost = 50000;
                break;
            default:
                $shippingCost = 0;
        }
    
        $totalAmount += $shippingCost;
    
        // Create the order
        $order = Orders::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'order_date' => now(),
            'total_amount' => $totalAmount,
            'status' => 'Pending',
        ]);
    
        // Save order details and reduce stock
        foreach ($cart as $productId => $item) {
            $product = Products::find($productId);
            if ($product) {
                // Reduce stock
                $product->stok_quantity -= $item['quantity'];
                $product->save();
    
                // Create order detail
                Orderdetails::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }
        }
    
        // Save the order ID in session
        Session::put('order_id', $order->id);
    
        return redirect()->route('payment');
    }
    
    public function payment()
    {
        $orderId = Session::get('order_id');
        if (!$orderId) {
            return redirect()->route('landing.index')->with('error', 'No order found for payment.');
        }
    
        $order = Orders::with('orderDetails.product')->find($orderId);
        if (!$order) {
            return redirect()->route('landing.index')->with('error', 'Order not found.');
        }
    
        $totalAmount = $order->total_amount;
        $customer = Auth::guard('customer')->user();
    
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    
        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $totalAmount,
            ),
            'customer_details' => array(
                'first_name' => $customer->name,
                'email' => $customer->email,
                'phone' => $customer->phone,
            ),
        );
    
        $snapToken = \Midtrans\Snap::getSnapToken($params);
    
        $paymentInfo = [
            'orderId' => $orderId,
            'totalAmount' => $order->total_amount,
            'status' => 'Pending',
            'orderDetails' => $order->orderDetails,
        ];
    
        return view('landing.payment', compact('paymentInfo', 'snapToken', 'order'));
    }
        



public function processPayment(Request $request)
{
    $orderId = Session::get('order_id');
    if (!$orderId) {
        return redirect()->route('landing.index')->with('error', 'No order found for payment.');
    }

    if ($request->input('payment_method') === 'midtrans') {
        // Handle Midtrans payment separately
        return response()->json(['snap_token' => $request->input('snap_token')]);
    } else {
        // Handle COD or other payment methods
        $payment = new Paymets();
        $payment->order_id = $orderId;
        $payment->payment_date = now();
        $payment->payment_method = $request->input('payment_method');
        $payment->amount = $request->input('amount');
        $payment->save();

        // Update order status or perform other necessary actions here

        return redirect()->route('landing.index')->with('success', 'Payment successful.');
    }
}
public function success(Request $request)
{
    $orderId = $request->query('order_id');
    
    // Find the order with the given ID
    $order = Orders::findOrFail($orderId);
    
    // Update the order status to "Paid"
    $order->status = 'Paid';
    $order->save();    
    
    // Clear the cart from session
    Session::forget('cart');
    
    return redirect()->route('landing.index')->with('success', 'Payment successful and order placed.');
}

}
