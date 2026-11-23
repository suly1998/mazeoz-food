<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminFoodController extends Controller
{
    public function dashboard()
    {
        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'pending')->count();

        $preparingOrders = Order::where('status', 'preparing')->count();

        $deliveredOrders = Order::where('status', 'delivered')->count();

        $cancelledOrders = Order::where('status', 'cancelled')->count();

        $totalSales = Order::where('status', '!=', 'cancelled')
            ->sum('total');

        $orders = Order::latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'preparingOrders',
            'deliveredOrders',
            'cancelledOrders',
            'totalSales',
            'orders'
        ));
    }

    /**
     * Display all orders and allow filtering by order ID, customer name, and date.
     */
    public function orders(Request $request)
    {
        $validated = $request->validate([
            'order_number' => ['nullable', 'integer', 'min:1'],
            'customer_name' => ['nullable', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
        ]);

        $query = Order::query();

        if (!empty($validated['order_number'])) {
            $query->where('id', $validated['order_number']);
        }

        if (!empty($validated['customer_name'])) {
            $query->where('customer_name', 'like', '%' . trim($validated['customer_name']) . '%');
        }

        if (!empty($validated['date'])) {
            $query->whereDate('created_at', $validated['date']);
        }

        $orders = $query->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.orders', compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = Order::with('items.food')->findOrFail($id);

        return view('admin.order-details', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,preparing,delivered,cancelled',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.order.details', $order->id)
            ->with('success', 'Order status updated successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Update Payment Status
    |--------------------------------------------------------------------------
    */

    public function updatePaymentStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,paid,failed',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'payment_status' => $request->payment_status,
        ]);

        return redirect()
            ->route('admin.order.details', $order->id)
            ->with('success', 'Payment status updated successfully.');
    }
}
