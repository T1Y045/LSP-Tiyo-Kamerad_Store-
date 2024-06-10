<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth.customer'])->group(function () {
Route::resource('/', \App\Http\Controllers\LandingController::class);
Route::get('/about', [\App\Http\Controllers\LandingController::class, 'about'])->name('landing.about');
Route::get('/video', [\App\Http\Controllers\LandingController::class, 'video'])->name('landing.video');
Route::get('/contact', [\App\Http\Controllers\LandingController::class, 'contact'])->name('landing.contact');
Route::get('/', [\App\Http\Controllers\LandingController::class, 'index'])->name('landing.index');
Route::get('/contact', [\App\Http\Controllers\LandingController::class, 'contact'])->name('landing.contact');

Route::get('/invoice', [\App\Http\Controllers\InvoiceController::class, 'show'])->name('landing.invoice');
Route::get('/cancel-order/{orderId}', [\App\Http\Controllers\InvoiceController::class, 'cancelOrder'])->name('cancel.order');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/product_detail/{id}', [App\Http\Controllers\LandingController::class, 'show'])->name('landing.show');
Route::post('/add-to-cart', [App\Http\Controllers\LandingController::class, 'addToCart'])->name('add_to_cart');
Route::get('/get-cart', [App\Http\Controllers\LandingController::class, 'getCart'])->name('get_cart');
Route::post('/remove-from-cart', [App\Http\Controllers\LandingController::class, 'removeFromCart'])->name('remove_from_cart');
Route::post('/checkout', [App\Http\Controllers\LandingController::class, 'checkout'])->name('checkout');
Route::get('/payment', [App\Http\Controllers\LandingController::class, 'payment'])->name('payment');
Route::post('/process-payment', [App\Http\Controllers\LandingController::class, 'processPayment'])->name('processPayment');
Route::post('/reviews', [App\Http\Controllers\LandingController::class, 'store'])->name('reviews.store');
Route::delete('/reviews/{id}', [App\Http\Controllers\LandingController::class, 'coremove'])->name('reviews.coremove');
route::get('/success',[App\Http\Controllers\LandingController::class, 'success'])->name('success');
route::post('/wishlist',[App\Http\Controllers\LandingController::class, 'wishlist'])->name('wishlist');
Route::get('/wishlist-get', [App\Http\Controllers\LandingController::class, 'getWishlist'])->name('get.wishlist');
route::post('/remove_wishlist',[App\Http\Controllers\LandingController::class, 'remove_wishlist'])->name('remove_wishlist');
Route::post('/wishlist', [App\Http\Controllers\WishlistController::class, 'store'])->name('wishlist.store');
Route::get('/wishlist-prof', [App\Http\Controllers\WishlistController::class, 'show'])->name('wishlist.show');
Route::delete('/wishlist/{id}', [App\Http\Controllers\WishlistController::class, 'destroy'])->name('wishlist.destroy');
Route::delete('/wishlist/{id}', [App\Http\Controllers\WishlistController::class, 'remove'])->name('wishlist.remove');
});




Route::middleware(['auth.user'])->group(function () {
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
Route::resource('product_categories', \App\Http\Controllers\ProductcategoriesController::class);
Route::resource('discount_categories', \App\Http\Controllers\DiscountcategoriesController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('customer', \App\Http\Controllers\CustomerController::class);
Route::resource('discounts', \App\Http\Controllers\DiscountController::class);
Route::resource('orders', \App\Http\Controllers\OrdersController::class);
Route::resource('review', \App\Http\Controllers\ReviewController::class);
Route::resource('products', \App\Http\Controllers\ProductsController::class);
Route::resource('deliveries', \App\Http\Controllers\DeliveriesController::class);
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'chart'])->name('dashboard.chart');

Route::resource('distributor', \App\Http\Controllers\DistributorController::class);
Route::resource('purchase', \App\Http\Controllers\PurchaseorderController::class);
Route::resource('purchase_item', \App\Http\Controllers\PurchaseorderitmesController::class);
Route::resource('bayar', \App\Http\Controllers\PaymentController::class);
Route::get('/payments/pdf', [App\Http\Controllers\PaymentController::class, 'generatePDF'])->name('payments.pdf');
Route::get('/wishlisti', [App\Http\Controllers\WishlistController::class, 'index'])->name('wishlisti.index');
});

// Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
// Route::get('/review/create/{id}', [App\Http\Controllers\ReviewController::class, 'create'])->name('review.create');
// Route::post('/review/store', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');
// Route::get('/wishlist/add/{id}', [App\Http\Controllers\WishlistController::class, 'add'])->name('wishlist.add');





// <===auth===>
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login_proses'])->name('user-login');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login'); // Menampilkan form login
Route::get('register', [AuthController::class, 'register'])->name('register'); // Menampilkan form registrasi
Route::post('register', [AuthController::class, 'registerSave'])->name('register.save'); // Menyimpan data registrasi
Route::get('profile', [AuthController::class, 'profile'])->name('profile');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');






