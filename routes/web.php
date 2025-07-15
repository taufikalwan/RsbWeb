<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Admin\PromoController;
use Illuminate\Support\Facades\Http;



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


Route::get('/', [\App\Http\Controllers\Frontend\HomepageController::class, 'index']);
Auth::routes();

Route::get('/produk', [ProductController::class, 'index'])->name('produk');

Route::get('/products', [ProductController::class, 'index']); // alias dari /produk
Route::get('product/{product:slug}', [ProductController::class, 'show'])->name('product.detail');
Route::get('products/quick-view/{product:slug}', [ProductController::class, 'quickView']);

Route::get('carts', [\App\Http\Controllers\Frontend\CartController::class, 'index'])->name('carts.index');
Route::post('carts', [\App\Http\Controllers\Frontend\CartController::class, 'store'])->name('carts.store');
Route::post('carts/update', [\App\Http\Controllers\Frontend\CartController::class, 'update']);
Route::get('carts/remove/{cartId}', [\App\Http\Controllers\Frontend\CartController::class, 'destroy']);
Route::get('reviews', [\App\Http\Controllers\Frontend\ReviewController::class, 'index'])->name('reviews.index');
Route::post('reviews', [\App\Http\Controllers\Frontend\ReviewController::class, 'store'])->name('reviews.store');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('orders/checkout', [\App\Http\Controllers\Frontend\OrderController::class, 'checkout']);
    Route::post('orders/checkout', [\App\Http\Controllers\Frontend\OrderController::class, 'doCheckout'])->name('orders.checkout');
    Route::get('orders/cities', [\App\Http\Controllers\Frontend\OrderController::class, 'cities']);
    Route::post('orders/shipping-cost', [\App\Http\Controllers\Frontend\OrderController::class, 'shippingCost']);
    Route::post('orders/set-shipping', [\App\Http\Controllers\Frontend\OrderController::class, 'setShipping']);
    Route::get('orders/received/{orderId}', [\App\Http\Controllers\Frontend\OrderController::class, 'received']);
    Route::get('orders', [\App\Http\Controllers\Frontend\OrderController::class, 'index'])->name('order.index');
    Route::get('orders/{orderId}', [\App\Http\Controllers\Frontend\OrderController::class, 'show']);
    Route::post('pay', [\App\Http\Controllers\Frontend\OrderController::class, 'pay'])->name('pay.process');

    Route::resource('wishlists', \App\Http\Controllers\Frontend\WishListController::class)->only(['index','store','destroy']);

    Route::get('profile',  [\App\Http\Controllers\Auth\ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile', [\App\Http\Controllers\Auth\ProfileController::class, 'update']);

});

Route::post('payments/notification', [\App\Http\Controllers\Frontend\PaymentController::class, 'notification']);
Route::get('payments/completed', [\App\Http\Controllers\Frontend\PaymentController::class, 'completed']);
Route::get('payments/failed', [\App\Http\Controllers\Frontend\PaymentController::class, 'failed']);
Route::get('payments/unfinish', [\App\Http\Controllers\Frontend\PaymentController::class, 'unfinish']);




Route::group(['middleware' => ['is_admin'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    // admin
    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');

    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('attributes', \App\Http\Controllers\Admin\AttributeController::class);
    Route::resource('attributes.attribute_options', \App\Http\Controllers\Admin\AttributeOptionController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('products.product_images', \App\Http\Controllers\Admin\ProductImageController::class);
     Route::resource('reviews', \App\Http\Controllers\Admin\ReviewController::class)->only(['index','edit','update','destroy','show']);

    Route::resource('slides', \App\Http\Controllers\Admin\SlideController::class);
    Route::get('slides/{slideId}/up', [\App\Http\Controllers\Admin\SlideController::class, 'moveUp']);
    Route::get('slides/{slideId}/down', [\App\Http\Controllers\Admin\SlideController::class, 'moveDown']);

    Route::get('orders/trashed', [\App\Http\Controllers\Admin\OrderController::class , 'trashed'])->name('orders.trashed');
    Route::get('orders/restore/{order:id}', [\App\Http\Controllers\Admin\OrderController::class , 'restore'])->name('orders.restore');
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
    Route::post('orders/complete/{order}', [\App\Http\Controllers\Admin\OrderController::class , 'doComplete'])->name('orders.complete');
    Route::get('orders/{order:id}/cancel', [\App\Http\Controllers\Admin\OrderController::class , 'cancel'])->name('orders.cancels');
	Route::put('orders/cancel/{order:id}', [\App\Http\Controllers\Admin\OrderController::class , 'doCancel'])->name('orders.cancel');
    Route::resource('shipments', \App\Http\Controllers\Admin\ShipmentController::class);

    Route::get('reports/revenue', [\App\Http\Controllers\Admin\ReportController::class, 'revenue'])->name('reports.revenue');
    Route::get('reports/product', [\App\Http\Controllers\Admin\ReportController::class, 'product'])->name('reports.product');
    Route::get('reports/inventory', [\App\Http\Controllers\Admin\ReportController::class, 'inventory'])->name('reports.inventory');
    Route::get('reports/payment', [\App\Http\Controllers\Admin\ReportController::class, 'payment'])->name('reports.payment');

    Route::resource('promos', PromoController::class);

    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

    // routes/web.php
// routes/web.php
Route::get('/test-wa', function () {
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('FONTE_API_TOKEN'),
        'Accept' => 'application/json',
    ])->post('https://app.fonte.chat/api/message/send-text', [
        'phone' => '62895704943234', // Ganti dengan nomor WA kamu
        'message' => 'Tes kirim WA dari Laravel ke Fonte berhasil ✅',
    ]);

    return $response->body();
});
});
