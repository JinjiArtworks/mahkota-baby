<?php

use App\Http\Controllers\Admin\AdminChatController;
use App\Http\Controllers\Admin\Resources\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Customers\CartController;
use App\Http\Controllers\Customers\CheckoutProductController;
use App\Http\Controllers\Customers\HomeController;
use App\Http\Controllers\Customers\ProductController;
use App\Http\Controllers\Customers\RiwayatPesananController;
use App\Http\Controllers\Customers\WishlistController;
use App\Http\Controllers\Admin\ListProductController;
use App\Http\Controllers\Admin\ResourcesController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Customers\CategoryController;
use App\Http\Controllers\Customers\ChatController;
use App\Http\Controllers\Customers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['as' => 'nav.'], function () {
    Route::get('/products', [ProductController::class, 'index'])->name('shop');
    Route::get('/detail-product/{id}', [ProductController::class, 'detail']);
    // Route::get('/belanja', [ProductController::class, 'index'])->name('about');
});

Route::middleware(['auth'])->group(function () {
    Route::group(['as' => 'products.'], function () {
        Route::post('/store-wishlist', [ProductController::class, 'addToWishlist'])->name('addToWishlist');
        Route::get('/belanja', [ProductController::class, 'search'])->name('search');
        Route::get('/informasi-produk', [ProductController::class, 'infoProduct'])->name('infoProduct');
        // Route::get('/belanja', [ProductController::class, 'searchByCat'])->name('searchByCat');
    });
    Route::group(['as' => 'categories.'], function () {
        Route::get('category', [CategoryController::class, 'index'])->name('index');
        Route::get('/detail-category/{id}', [CategoryController::class, 'detail']);
    });
    Route::group(['as' => 'wishlist.'], function () {
        Route::get('/wishlist', [WishlistController::class, 'index'])->name('index');
        Route::get('/remove-wishilist', [WishlistController::class, 'destroy'])->name('remove');
    });
    Route::group(['as' => 'cart.'], function () {
        Route::post('/update-address', [CartController::class, 'update'])->name('updateAddress');
        Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add');
        Route::get('/cart', [CartController::class, 'index'])->name('index');
        Route::get('/remove-from-cart/{id}', [CartController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'checkout.'], function () {
        Route::post('/checkout-batik', [CheckoutProductController::class, 'index'])->name('index');
        Route::post('/checkout-batik/payments', [CheckoutProductController::class, 'store'])->name('store');
    });
    Route::group(['as' => 'chat.'], function () {
        Route::get('/chat', [ChatController::class, 'index'])->name('index');
        Route::post('/send-chat-user', [ChatController::class, 'sendUserMsg'])->name('userMsg');
    });
    Route::group(['as' => 'history-order.'], function () {
        Route::get('/riwayat-pesanan', [RiwayatPesananController::class, 'index'])->name('index');
        Route::get('/detail-pesanan/{id}', [RiwayatPesananController::class, 'detailsOrder'])->name('detail');
        Route::get('/orders-delete/{id}', [RiwayatPesananController::class, 'remove'])->name('delete');
        Route::get('/send-review-rating/{id}', [RiwayatPesananController::class, 'reviewPages'])->name('reviewPages');
        Route::post('/send-review/{id}', [RiwayatPesananController::class, 'storeReview'])->name('review');
        Route::post('/accept-item/{id}', [RiwayatPesananController::class, 'acceptOrder'])->name('acceptOrder');
    });
});


Route::middleware(['auth'])->group(function () {
    Route::group(['as' => 'dashboard.'], function () {
        Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('index');
        Route::get('/admin-dashboard/details/{id}', [DashboardController::class, 'detail'])->name('details');
        Route::put('/admin-dashboard/details/send-item/{id}', [DashboardController::class, 'update'])->name('update');
    });
    Route::group(['as' => 'products.'], function () {
        Route::get('admin-products', [ListProductController::class, 'index'])->name('index');
        Route::get('create-products', [ListProductController::class, 'create'])->name('create');
        Route::get('edit-products/{id}', [ListProductController::class, 'edit'])->name('edit');
        Route::post('store-products', [ListProductController::class, 'store'])->name('store');
        Route::put('update-products/{id}', [ListProductController::class, 'update'])->name('update');
        Route::get('delete-products/{id}', [ListProductController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'vendors.'], function () {
        Route::get('/admin-vendors', [VendorController::class, 'index'])->name('index');
        Route::get('create-vendors', [VendorController::class, 'create'])->name('create');
        Route::get('edit-vendors/{id}', [VendorController::class, 'edit'])->name('edit');
        Route::post('store-vendors', [VendorController::class, 'store'])->name('store');
        Route::put('update-vendors/{id}', [VendorController::class, 'update'])->name('update');
        Route::get('delete-vendors/{id}', [VendorController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'kupons.'], function () {
        Route::get('/admin-kupons', [CouponController::class, 'index'])->name('index');
        Route::get('create-kupons', [CouponController::class, 'create'])->name('create');
        Route::get('edit-kupons/{id}', [CouponController::class, 'edit'])->name('edit');
        Route::post('store-kupons', [CouponController::class, 'store'])->name('store');
        Route::put('update-kupons/{id}', [CouponController::class, 'update'])->name('update');
        Route::get('delete-kupons/{id}', [CouponController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'chats.'], function () {
        Route::get('/chat-admin', [AdminChatController::class, 'index'])->name('index');
        Route::post('/send-chat-admin', [AdminChatController::class, 'sendAdminMsg'])->name('adminMsg');
    });
    Route::group(['as' => 'resources.'], function () {
        Route::get('/admin-resources', [ResourcesController::class, 'index'])->name('index');
        // Route::get('create-resources', [CouponController::class, 'create'])->name('create');
        // Route::get('edit-resources/{id}', [CouponController::class, 'edit'])->name('edit');
        // Route::post('store-resources', [CouponController::class, 'store'])->name('store');
        // Route::put('update-resources/{id}', [CouponController::class, 'update'])->name('update');
        // Route::get('delete-resources/{id}', [CouponController::class, 'destroy'])->name('delete');
    });
});
Route::get('/checkout', function () {
    return view('customers.checkout');
});
require __DIR__ . '/auth.php';
