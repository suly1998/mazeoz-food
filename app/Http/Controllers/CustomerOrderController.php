<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | My Orders
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $orders = Auth::user()
            ->orders()
            ->with('items')
            ->latest()
            ->get();

        return view('customer.orders', compact('orders'));
    }


    /*
    |--------------------------------------------------------------------------
    | Order Details
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $order = Auth::user()
            ->orders()
            ->with('items.food')
            ->findOrFail($id);

        return view('customer.order-details', compact('order'));
    }
}