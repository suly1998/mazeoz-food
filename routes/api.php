<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FoodApiController;
use App\Http\Controllers\Api\CustomerAuthApiController;
use App\Http\Controllers\Api\ApiCheckoutController;

// Public API routes
Route::get('/foods', [FoodApiController::class, 'index'])
    ->name('api.foods.index'); 

Route::post('/register', [CustomerAuthApiController::class, 'register'])
    ->name('api.register');

Route::post('/login', [CustomerAuthApiController::class, 'login'])
    ->name('api.login');

// Protected API routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [CustomerAuthApiController::class, 'me'])
        ->name('api.me');

        Route::post('/checkout', [ApiCheckoutController::class, 'store'])
    ->name('api.checkout');

    Route::post('/logout', [CustomerAuthApiController::class, 'logout'])
        ->name('api.logout');
});
