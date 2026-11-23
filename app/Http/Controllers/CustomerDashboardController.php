<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = $user->orders();

        $totalOrders = $orders->count();

        $pendingOrders = $user->orders()
            ->where('status', 'pending')
            ->count();

        $preparingOrders = $user->orders()
            ->where('status', 'preparing')
            ->count();

        $deliveredOrders = $user->orders()
            ->where('status', 'delivered')
            ->count();

        $totalSpent = $user->orders()
            ->where('status', '!=', 'cancelled')
            ->sum('total');

        $recentOrders = $user->orders()
            ->latest()
            ->take(5)
            ->get();

        return view('customer.dashboard', compact(
            'user',
            'totalOrders',
            'pendingOrders',
            'preparingOrders',
            'deliveredOrders',
            'totalSpent',
            'recentOrders'
        ));
    }
}