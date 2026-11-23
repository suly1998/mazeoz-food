<?php

namespace App\Http\Controllers;

use App\Models\Food;

class CartController extends Controller
{
    // Add food to cart
    public function add($id)
    {
        $food = Food::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [
                'name' => $food->name,
                'price' => $food->price,
                'image' => $food->image,
                'quantity' => 1,
            ];

        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart')
            ->with('success', 'Food added to cart!');
    }


    // Show cart
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;

        foreach ($cart as $item) {

            $total += $item['price'] * $item['quantity'];

        }

        return view('cart', compact('cart', 'total'));
    }


    // Increase quantity
    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        }

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }


    // Decrease quantity
    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            if ($cart[$id]['quantity'] > 1) {

                $cart[$id]['quantity']--;

            } else {

                unset($cart[$id]);

            }

        }

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }


    // Remove food from cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

        }

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }
}