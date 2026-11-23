<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'pending')->count();

        $preparingOrders = Order::where('status', 'preparing')->count();

        $deliveredOrders = Order::where('status', 'delivered')->count();

        $cancelledOrders = Order::where('status', 'cancelled')->count();

        $totalSales = Order::where('status', '!=', 'cancelled')
            ->sum('total');

        // Search orders directly from the Admin Dashboard.
        $query = Order::query();

        if ($request->filled('order_number')) {
            $query->where('id', $request->input('order_number'));
        }

        if ($request->filled('customer_name')) {
            $query->where(
                'customer_name',
                'like',
                '%' . trim($request->input('customer_name')) . '%'
            );
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $isSearching = $request->filled('order_number')
            || $request->filled('customer_name')
            || $request->filled('date');

        // Normal dashboard shows latest 10; a search shows all matching orders.
        $ordersQuery = $query->latest();

        $orders = $isSearching
            ? $ordersQuery->get()
            : $ordersQuery->take(10)->get();

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
