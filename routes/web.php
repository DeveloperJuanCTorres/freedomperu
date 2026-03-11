<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
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



Auth::routes();

/*
|--------------------------------------------------------------------------
| TIENDA
|--------------------------------------------------------------------------
*/

// Home → redirige a tienda
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/nosotros', [HomeController::class, 'about'])->name('about');

Route::get('/contactanos', [HomeController::class, 'contact'])->name('contact');

// Listado productos
Route::get('/tienda', [ShopController::class, 'index'])->name('shop.index');

// Detalle producto
Route::get('/producto/{slug}', [ProductController::class, 'show'])
    ->name('shop.show');

/*
|--------------------------------------------------------------------------
| CARRITO
|--------------------------------------------------------------------------
*/

Route::prefix('carrito')->group(function () {

    Route::get('/', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/agregar', [CartController::class, 'add'])
        ->name('cart.add');

    Route::delete('/eliminar/{key}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::delete('/vaciar', [CartController::class, 'clear'])
        ->name('cart.clear');
});

/*
|--------------------------------------------------------------------------
| CHECKOUT
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout/aplicar-cupon', [CheckoutController::class, 'applyCoupon'])
        ->name('checkout.coupon');

    Route::post('/checkout/procesar', [OrderController::class, 'store'])
        ->name('orders.store');
});

/*
|--------------------------------------------------------------------------
| PEDIDOS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/pedido/{id}', [OrderController::class, 'show'])
        ->name('orders.show');
});

/*
|--------------------------------------------------------------------------
| PAGOS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/pago/confirmar/{orderId}', [PaymentController::class, 'confirm'])
        ->name('payment.confirm');
});

/*
|--------------------------------------------------------------------------
| DISEÑOS
|--------------------------------------------------------------------------
*/

Route::get('/disenos', [DesignController::class, 'index'])
    ->name('design.index');

Route::get('/disenos/{slug}', [DesignController::class, 'show'])
    ->name('design.show');


/*
|--------------------------------------------------------------------------
| PRODUCCIÓN (ADMIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/ordenes', function () {
        return view('admin.orders.index');
    })->name('admin.orders.index');

    Route::post('/orden/{orderId}/produccion/{status}',
        [ProductionController::class, 'updateStatus']
    )->name('admin.production.update');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
