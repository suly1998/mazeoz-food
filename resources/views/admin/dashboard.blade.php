<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard - Mazeoz Food</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f5f6fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #212529;
        }

        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background-color: #343a40;
        }

        .stat-card {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
        }

        .table-card {
            border: none;
            border-radius: 15px;
        }

    </style>

</head>


<body>


<div class="container-fluid">

    <div class="row">


        {{-- ========================= --}}
        {{-- SIDEBAR --}}
        {{-- ========================= --}}

        <div class="col-md-2 sidebar p-3">

            <h4 class="text-white fw-bold mb-4">
                🍔 Mazeoz Food
            </h4>


            <a href="{{ route('admin.dashboard') }}">
                📊 Dashboard
            </a>


            <a href="{{ route('admin.foods.index') }}">
                🍔 Foods
            </a>


            <a href="{{ route('home') }}">
                🏠 View Website
            </a>


            <a href="{{ route('cart') }}">
                🛒 Cart
            </a>


            {{-- LOGOUT --}}

            <hr class="border-secondary mt-4">


            <form
                action="{{ route('admin.logout') }}"
                method="POST"
                class="mt-3"
            >

                @csrf

                <button
                    type="submit"
                    class="btn btn-danger w-100"
                    onclick="return confirm('Are you sure you want to logout?');"
                >
                    🚪 Logout
                </button>

            </form>

        </div>



        {{-- ========================= --}}
        {{-- MAIN CONTENT --}}
        {{-- ========================= --}}

        <div class="col-md-10 p-4">


            {{-- HEADER --}}

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold mb-1">
                        Admin Dashboard
                    </h2>

                    <p class="text-muted mb-0">
                        Mazeoz Food Management System
                    </p>

                </div>


                <div>

                    <span class="badge bg-success fs-6">
                        👑 Admin
                    </span>

                </div>

            </div>



            {{-- ========================= --}}
            {{-- SUCCESS MESSAGE --}}
            {{-- ========================= --}}

            @if (session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    ✅ {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            @endif



            {{-- ========================= --}}
            {{-- STATISTICS --}}
            {{-- ========================= --}}

            <div class="row g-4 mb-4">


                {{-- Total Orders --}}

                <div class="col-md-4 col-lg">

                    <div class="card stat-card shadow-sm">

                        <div class="card-body">

                            <p class="text-muted mb-1">
                                Total Orders
                            </p>

                            <div class="stat-number">
                                {{ $totalOrders }}
                            </div>

                            <span class="text-primary">
                                📦 All Orders
                            </span>

                        </div>

                    </div>

                </div>



                {{-- Pending --}}

                <div class="col-md-4 col-lg">

                    <div class="card stat-card shadow-sm">

                        <div class="card-body">

                            <p class="text-muted mb-1">
                                Pending
                            </p>

                            <div class="stat-number text-warning">
                                {{ $pendingOrders }}
                            </div>

                            <span class="text-warning">
                                ⏳ Waiting
                            </span>

                        </div>

                    </div>

                </div>



                {{-- Preparing --}}

                <div class="col-md-4 col-lg">

                    <div class="card stat-card shadow-sm">

                        <div class="card-body">

                            <p class="text-muted mb-1">
                                Preparing
                            </p>

                            <div class="stat-number text-info">
                                {{ $preparingOrders }}
                            </div>

                            <span class="text-info">
                                👨‍🍳 Kitchen
                            </span>

                        </div>

                    </div>

                </div>



                {{-- Delivered --}}

                <div class="col-md-4 col-lg">

                    <div class="card stat-card shadow-sm">

                        <div class="card-body">

                            <p class="text-muted mb-1">
                                Delivered
                            </p>

                            <div class="stat-number text-success">
                                {{ $deliveredOrders }}
                            </div>

                            <span class="text-success">
                                🚚 Completed
                            </span>

                        </div>

                    </div>

                </div>



                {{-- Cancelled --}}

                <div class="col-md-4 col-lg">

                    <div class="card stat-card shadow-sm">

                        <div class="card-body">

                            <p class="text-muted mb-1">
                                Cancelled
                            </p>

                            <div class="stat-number text-danger">
                                {{ $cancelledOrders }}
                            </div>

                            <span class="text-danger">
                                ❌ Cancelled
                            </span>

                        </div>

                    </div>

                </div>


            </div>



            {{-- ========================= --}}
            {{-- TOTAL SALES --}}
            {{-- ========================= --}}

            <div class="card shadow-sm table-card mb-4">

                <div class="card-body">

                    <div class="row align-items-center">

                        <div class="col-md-8">

                            <h5 class="fw-bold">
                                💰 Total Sales
                            </h5>

                            <p class="text-muted mb-0">
                                Revenue from non-cancelled orders
                            </p>

                        </div>


                        <div class="col-md-4 text-md-end">

                            <h2 class="fw-bold text-success mb-0">

                                TZS {{ number_format($totalSales) }}

                            </h2>

                        </div>

                    </div>

                </div>

            </div>




            {{-- ========================= --}}
            {{-- ORDER SEARCH --}}
            {{-- ========================= --}}

            <div class="card shadow-sm table-card mb-4" id="order-search">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                        <div>
                            <h5 class="fw-bold mb-1">🔎 Search Orders</h5>
                            <p class="text-muted mb-0">Search by order number, customer name, or order date.</p>
                        </div>
                    </div>

                    <form method="GET" action="{{ route('admin.dashboard') }}">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label for="order_number" class="form-label fw-semibold">Order Number</label>
                                <input
                                    type="number"
                                    min="1"
                                    class="form-control"
                                    id="order_number"
                                    name="order_number"
                                    placeholder="e.g. 25"
                                    value="{{ request('order_number') }}"
                                >
                            </div>

                            <div class="col-md-4">
                                <label for="customer_name" class="form-label fw-semibold">Customer Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="customer_name"
                                    name="customer_name"
                                    placeholder="Enter customer name"
                                    value="{{ request('customer_name') }}"
                                >
                            </div>

                            <div class="col-md-3">
                                <label for="order_date" class="form-label fw-semibold">Order Date</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="order_date"
                                    name="date"
                                    value="{{ request('date') }}"
                                >
                            </div>

                            <div class="col-md-2 d-flex gap-2">
                                <button type="submit" class="btn btn-primary w-100">
                                    🔎 Search
                                </button>
                            </div>
                        </div>

                        @if(request()->hasAny(['order_number', 'customer_name', 'date']))
                            <div class="mt-3">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">
                                    Reset Search
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            {{-- ========================= --}}
            {{-- RECENT ORDERS --}}
            {{-- ========================= --}}

            <div class="card shadow-sm table-card">

                <div class="card-body">


                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="fw-bold mb-0">
                            📋 Recent Orders
                        </h5>

                        <span class="text-muted">
                            Latest 10 orders
                        </span>

                    </div>



                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-dark">

                                <tr>

                                    <th>
                                        #
                                    </th>

                                    <th>
                                        Customer
                                    </th>

                                    <th>
                                        Phone
                                    </th>

                                    <th>
                                        Location
                                    </th>

                                    <th>
                                        Total
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Payment Status
                                    </th>

                                    <th>
                                        Date
                                    </th>

                                    <th>
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse ($orders as $order)

                                    <tr>


                                        {{-- Order ID --}}

                                        <td class="fw-bold">
                                            #{{ $order->id }}
                                        </td>


                                        {{-- Customer --}}

                                        <td>
                                            {{ $order->customer_name }}
                                        </td>


                                        {{-- Phone --}}

                                        <td>
                                            {{ $order->phone }}
                                        </td>


                                        {{-- Location --}}

                                        <td>
                                            {{ $order->location }}
                                        </td>


                                        {{-- Total --}}

                                        <td class="fw-bold">
                                            TZS {{ number_format($order->total) }}
                                        </td>


                                        {{-- Status --}}

                                        <td>

                                            @if ($order->status === 'pending')

                                                <span class="badge bg-warning text-dark">
                                                    ⏳ Pending
                                                </span>

                                            @elseif ($order->status === 'preparing')

                                                <span class="badge bg-info text-dark">
                                                    👨‍🍳 Preparing
                                                </span>

                                            @elseif ($order->status === 'delivered')

                                                <span class="badge bg-success">
                                                    🚚 Delivered
                                                </span>

                                            @elseif ($order->status === 'cancelled')

                                                <span class="badge bg-danger">
                                                    ❌ Cancelled
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Payment Status --}}

                                        <td>
                                            @php
                                                $paymentStatus = $order->payment_status ?? 'pending';
                                            @endphp

                                            @if ($paymentStatus === 'paid')
                                                <span class="badge bg-success">
                                                    ✅ Paid
                                                </span>
                                            @elseif ($paymentStatus === 'failed')
                                                <span class="badge bg-danger">
                                                    ❌ Failed
                                                </span>
                                            @elseif ($paymentStatus === 'pending')
                                                <span class="badge bg-warning text-dark">
                                                    ⏳ Pending
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    {{ ucfirst($paymentStatus) }}
                                                </span>
                                            @endif
                                        </td>


                                        {{-- Date --}}

                                        <td>
                                            {{ $order->created_at->format('d M Y H:i') }}
                                        </td>


                                        {{-- Action --}}

                                        <td>

                                            <a
                                                href="{{ route('admin.order.details', $order->id) }}"
                                                class="btn btn-sm btn-dark"
                                            >
                                                👁️ View
                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="9"
                                            class="text-center py-4 text-muted"
                                        >

                                            No orders found.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                </div>

            </div>


        </div>

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>