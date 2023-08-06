<?php

use App\Http\Controllers\Customers\CartController;
use App\Http\Controllers\Customers\CheckoutProductController;
use App\Http\Controllers\Customers\HomeController;
use App\Http\Controllers\Customers\ProductController;
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
        Route::post('/store-wishlist', [ProductController::class, 'store'])->name('wishlist');
        Route::get('/belanja', [ProductController::class, 'search'])->name('search');
        // Route::get('/belanja', [ProductController::class, 'searchByCat'])->name('searchByCat');
    });
    Route::group(['as' => 'wishlist.'], function () {
        Route::get('/wishlist', [WishlistController::class, 'index'])->name('index');
        Route::get('/remove-wishilist', [WishlistController::class, 'destroy'])->name('remove');
    });
    Route::group(['as' => 'profile.'], function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('index');
        Route::post('/update-profile', [ProfileController::class, 'update'])->name('update');
    });
    Route::group(['as' => 'cart.'], function () {
        Route::post('/update-address', [CartController::class, 'update'])->name('update');
        
        Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add');
        Route::get('/cart', [CartController::class, 'index'])->name('index');
        Route::get('/remove-from-cart/{id}', [CartController::class, 'destroy'])->name('delete');

    });
    Route::group(['as' => 'checkout.'], function () {
        Route::post('/checkout-batik', [CheckoutProductController::class, 'index'])->name('index');
        Route::post('/checkout-batik/payments', [CheckoutProductController::class, 'store'])->name('store');
    });
    Route::group(['as' => 'history-order.'], function () {
        Route::get('/history-order', [HistoryOrderController::class, 'index'])->name('index');
        Route::get('/history-detail/{id}', [HistoryOrderController::class, 'detail'])->name('detail');
        Route::get('/orders-delete/{id}', [HistoryOrderController::class, 'remove'])->name('delete');
        Route::post('/send-review/{id}', [HistoryOrderController::class, 'store'])->name('review');
        Route::post('/send-returns/{id}', [HistoryOrderController::class, 'storeReturns'])->name('returns');
        Route::post('/send-returns-back/{id}', [HistoryOrderController::class, 'storeReturnsBack'])->name('sendReturnsBack');
        Route::post('/accept-item/{id}', [HistoryOrderController::class, 'acceptOrder'])->name('acceptOrder');
    });

    Route::group(['as' => 'custom.'], function () {
        Route::get('/list-produk-custom', [CustomBatikController::class, 'index'])->name('index');
        Route::post('/custom-check/{id}', [CustomBatikController::class, 'check'])->name('check');
        Route::post('/custom-check-results/{id}', [CustomBatikController::class, 'results'])->name('results');
        Route::post('/custom-batik/{id}', [CustomBatikController::class, 'details'])->name('details');

        Route::get('/list-order', [ListOrderController::class, 'index'])->name('orders');
        Route::post('/add-to-list/{id}', [ListOrderController::class, 'addList'])->name('add');
        Route::post('/add-custom-list/{id}', [ListOrderController::class, 'addCustom'])->name('add-custom');
        Route::get('/remove-from-list/{id}', [ListOrderController::class, 'destroy'])->name('remove');

        Route::post('/checkout-custom', [CheckoutCustomController::class, 'checkout'])->name('checkout');
        Route::post('/checkout-custom/payments-custom', [CheckoutCustomController::class, 'store'])->name('store');
    });
});

Route::get('/checkout', function () {
    return view('customers.checkout');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
