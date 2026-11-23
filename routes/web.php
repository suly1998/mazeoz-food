<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FoodController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFoodController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\CustomerDashboardController;


/*
|--------------------------------------------------------------------------
| Customer Website
|--------------------------------------------------------------------------
*/

Route::middleware('locale')->group(function () {

    // Home
    Route::get('/', [FoodController::class, 'index'])
        ->name('home');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart');

    Route::get('/cart/add/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::get('/cart/increase/{id}', [CartController::class, 'increase'])
        ->name('cart.increase');

    Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])
        ->name('cart.decrease');

    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    // Customer Authentication
    Route::get('/register', [CustomerAuthController::class, 'showRegister'])
        ->name('customer.register');

    Route::post('/register', [CustomerAuthController::class, 'register'])
        ->name('customer.register.submit');

    Route::get('/login', [CustomerAuthController::class, 'showLogin'])
        ->name('customer.login');

    Route::post('/login', [CustomerAuthController::class, 'login'])
        ->name('customer.login.submit');

    Route::post('/logout', [CustomerAuthController::class, 'logout'])
        ->name('customer.logout');
});


/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');


/*
|--------------------------------------------------------------------------
| Authenticated Customer
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'locale'])->group(function () {

    // Customer Dashboard
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])
        ->name('customer.dashboard');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout');

    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
        ->name('checkout.place');

    // Order Success
    Route::get('/order-success/{id}', function ($id) {
        return view('order-success', compact('id'));
    })->name('order.success');

    // Customer Profile
    Route::get('/profile', [CustomerProfileController::class, 'index'])
        ->name('customer.profile');

    Route::put('/profile', [CustomerProfileController::class, 'update'])
        ->name('customer.profile.update');

    // Change Password
    Route::get('/profile/password', [CustomerProfileController::class, 'passwordForm'])
        ->name('customer.password');

    Route::put('/profile/password', [CustomerProfileController::class, 'updatePassword'])
        ->name('customer.password.update');

    // Delivery Address
    Route::get('/profile/address', [CustomerProfileController::class, 'address'])
        ->name('customer.address');

    Route::put('/profile/address', [CustomerProfileController::class, 'updateAddress'])
        ->name('customer.address.update');

    // Settings
    Route::get('/profile/settings', [CustomerProfileController::class, 'settings'])
        ->name('customer.settings');

    Route::put('/profile/settings', [CustomerProfileController::class, 'updateSettings'])
        ->name('customer.settings.update');

    // My Orders
    Route::get('/my-orders', [CustomerOrderController::class, 'index'])
        ->name('customer.orders');

    Route::get('/my-orders/{id}', [CustomerOrderController::class, 'show'])
        ->name('customer.order.details');
});


/*
|--------------------------------------------------------------------------
| Protected Admin
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

    // Admin Dashboard
    Route::get('/admin', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // Admin Orders
    Route::get('/admin/orders/{id}', [AdminController::class, 'orderDetails'])
        ->name('admin.order.details');

    Route::post('/admin/orders/{id}/status', [AdminController::class, 'updateStatus'])
        ->name('admin.order.status');

    // Update Payment Status
    Route::post('/admin/orders/{id}/payment-status', [AdminController::class, 'updatePaymentStatus'])
        ->name('admin.order.payment.status');

    // Admin Foods
    Route::get('/admin/foods', [AdminFoodController::class, 'index'])
        ->name('admin.foods.index');

    Route::get('/admin/foods/create', [AdminFoodController::class, 'create'])
        ->name('admin.foods.create');

    Route::post('/admin/foods', [AdminFoodController::class, 'store'])
        ->name('admin.foods.store');

    Route::get('/admin/foods/{id}/edit', [AdminFoodController::class, 'edit'])
        ->name('admin.foods.edit');

    Route::put('/admin/foods/{id}', [AdminFoodController::class, 'update'])
        ->name('admin.foods.update');

    Route::patch('/admin/foods/{id}/toggle', [AdminFoodController::class, 'toggleAvailability'])
        ->name('admin.foods.toggle');

    Route::delete('/admin/foods/{id}', [AdminFoodController::class, 'destroy'])
        ->name('admin.foods.destroy');
});