<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect()
                ->route('home')
                ->with('error', 'Your cart is empty.');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout', compact('cart', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'notes' => 'nullable|string|max:1000',

            'payment_method' => [
                'required',
                'in:cash,mpesa,airtel_money,tigo_pesa'
            ],
        ]);

        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect()
                ->route('home')
                ->with('error', 'Your cart is empty.');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = DB::transaction(function () use ($request, $cart, $total) {

            $order = Order::create([
                'user_id' => auth()->id(),
                'customer_name' => $request->customer_name,
                'phone' => $request->phone,
                'location' => $request->location,
                'notes' => $request->notes,
                'total' => $total,
                'status' => 'pending',

                // Payment
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'transaction_reference' => null,
            ]);

            foreach ($cart as $foodId => $item) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'food_id' => $foodId,
                    'food_name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            return $order;
        });

        session()->forget('cart');

        return redirect()
            ->route('order.success', $order->id);
    }
}