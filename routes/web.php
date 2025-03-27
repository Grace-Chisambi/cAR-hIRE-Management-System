<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CtechPaymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CusController;



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
// routes/web.php
Route::get('index',[PageController::class,'index']);
Route::get('about',[PageController::class,'about']);
Route::get('car',  [PageController::class,'car']);
Route::get('services',[PageController::class,'services']);
Route::get('contact',[PageController::class,'contact']);
Route::get('admin',[PageController::class,'admin']);


Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::post('/ctechPayment/{booking_id}', [CtechPaymentController::class, 'createPayment'])->name('ctechPayment.createPayment');
Route::get('/ctechPayment/callback/{transaction_ref}', [CtechPaymentController::class, 'handleCallback'])->name('ctechPayment.callback');
Route::post('/ctechPayment/airtel', [CtechPaymentController::class, 'createAirtelPayment'])->name('ctechPayment.airtel');
Route::get('/email', [EmailController::class, 'showForm'])->name('email.showForm');
Route::post('/email', [EmailController::class, 'sendEmail'])->name('email.sendEmail');

Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');
Route::get('/send-email', [EmailController::class, 'showForm'])->name('email.form');


Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
require __DIR__.'/auth.php';

Route::get('/cars', [CarController::class, 'showCars'])->name('cars.pricing');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'pricing'])->name('cart.pricing');
    Route::post('/cart/add/{car}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{car}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


       Route::get('/cart', [CartController::class, 'pricing'])->name('cart.pricing');
Route::delete('/cart/remove/{carId}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cars/search', [CartController::class, 'search'])->name('cars.search');
Route::get('/pricing', [CartController::class, 'pricing'])->name('cart.pricing');
Route::get('/cars/search', [CartController::class, 'search'])->name('cars.search');


// Route for searching cars
Route::get('/pricing/search', [CarController::class, 'search'])->name('cars.search');

// Route for adding a car to the cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/pricing', [CartController::class, 'showPricing'])->name('cars.pricing');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');


// Route for showing the cart and proceeding to checkout
Route::get('/pricing', [CartController::class, 'showCart'])->name('cart.pricing');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/checkout', [CheckoutController::class, 'process']);
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

Route::post('/payment/callback', [PaymentController::class, 'handleCallback'])->name('payment.callback');

    // Other routes...

Route::get('/payment/{booking_id}', [PaymentController::class, 'createPayment'])->name('payment.createPayment');

Route::get('/customer', [CusController::class, 'index'])->name('customer.index');



Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/customers', [CusController::class, 'index'])->name('customer.index'); // Display customer list
Route::post('/customers', [CusController::class, 'store'])->name('customer.store'); // Add new customer
Route::put('/customers/{customer_id}', [CusController::class, 'update'])->name('customer.update'); // Edit customer
Route::delete('/customers/{customer_id}', [CusController::class, 'destroy'])->name('customer.destroy'); // Delete customer


Route::prefix('staff')->group(function () {
    Route::get('/', [StaffController::class, 'index'])->name('staff.index'); // Show staff list
    Route::post('/', [StaffController::class, 'store'])->name('staff.store'); // Add new staff
    Route::put('/{staff}', [StaffController::class, 'update'])->name('staff.update'); // Update staff
    Route::delete('/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy'); // Delete staff
    Route::get('/staff/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
    Route::put('/staff/{id}', [StaffController::class, 'update'])->name('staff.update');

});
 Route::resource('staff', StaffController::class);


});


