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

Route::post('/cart/add',[CartController::class,'add'])->name('cart.add');

Route::get('/cart/content',[CartController::class,'content'])->name('cart.content');

Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::prefix('carrito')->group(function () {

    Route::get('/', [CartController::class, 'index'])
        ->name('cart.index');


    // Route::delete('/vaciar', [CartController::class, 'clear'])
    //     ->name('cart.clear');
});


Route::post('/cart/add-customized', [CartController::class, 'addCustomized'])
    ->name('cart.addCustomized');

/*
|--------------------------------------------------------------------------
| CHECKOUT
|--------------------------------------------------------------------------
*/
Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

Route::middleware(['auth'])->group(function () {

    

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
