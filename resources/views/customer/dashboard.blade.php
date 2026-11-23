<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ __('messages.dashboard') }} - Mazeoz Food</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: #111827;
            color: white;
            position: fixed;
            width: 250px;
            left: 0;
            top: 0;
            bottom: 0;
            padding: 25px 15px;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 35px;
        }

        .sidebar a {
            color: #d1d5db;
            text-decoration: none;
            display: block;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 8px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #1f2937;
            color: white;
        }

        .sidebar a.active {
            background: #dc3545;
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            background: white;
            padding: 18px 25px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.05);
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            height: 100%;
            box-shadow: 0 3px 15px rgba(0,0,0,0.05);
            transition: 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 15px;
        }

        .orders-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.05);
        }

        .order-row {
            border-bottom: 1px solid #eee;
            padding: 16px 0;
        }

        .order-row:last-child {
            border-bottom: none;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-preparing {
            background: #cff4fc;
            color: #055160;
        }

        .status-delivered {
            background: #d1e7dd;
            color: #0f5132;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #842029;
        }

        @media (max-width: 991px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="brand">
        🍔 Mazeoz Food
    </div>

    <a href="{{ route('customer.dashboard') }}" class="active">
        📊 {{ __('messages.dashboard') }}
    </a>

    <a href="{{ route('customer.profile') }}">
        👤 {{ __('messages.my_profile') }}
    </a>

    <a href="{{ route('customer.orders') }}">
        🛒 {{ __('messages.my_orders') }}
    </a>

    <a href="{{ route('customer.password') }}">
        🔐 {{ __('messages.change_password') }}
    </a>

    <a href="{{ route('customer.address') }}">
        📍 {{ __('messages.delivery_address') }}
    </a>

    <a href="{{ route('customer.settings') }}">
        ⚙️ {{ __('messages.settings') }}
    </a>

    <hr class="border-secondary">

    <a href="{{ route('home') }}">
        🌐 {{ __('messages.visit_website') }}
    </a>

    <form action="{{ route('customer.logout') }}" method="POST">
        @csrf

        <button
            type="submit"
            class="btn btn-danger w-100 mt-2"
            onclick="return confirm('Are you sure you want to logout?');"
        >
            🚪 {{ __('messages.logout') }}
        </button>
    </form>

</div>


<!-- MAIN CONTENT -->
<div class="main-content">

    <!-- TOP BAR -->
    <div class="topbar d-flex justify-content-between align-items-center">

        <div>
            <h4 class="mb-1">
                {{ __('messages.welcome') }}, {{ $user->name }} 👋
            </h4>

            <small class="text-muted">
                {{ __('messages.customer_account') }}
            </small>
        </div>

        <div>
            <span class="badge bg-danger px-3 py-2">
                {{ $user->email }}
            </span>
        </div>

    </div>


    <!-- PAGE TITLE -->
    <div class="mb-4">

        <h2 class="fw-bold">
            📊 {{ __('messages.dashboard') }}
        </h2>

        <p class="text-muted">
            {{ __('messages.orders_description') }}
        </p>

    </div>


    <!-- STATISTICS -->
    <div class="row g-4 mb-4">

        <!-- Total Orders -->
        <div class="col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon bg-primary-subtle text-primary">
                    🛒
                </div>

                <small class="text-muted">
                    {{ __('messages.my_orders') }}
                </small>

                <h2 class="fw-bold mt-2 mb-0">
                    {{ $totalOrders }}
                </h2>

            </div>

        </div>


        <!-- Pending -->
        <div class="col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon bg-warning-subtle text-warning">
                    ⏳
                </div>

                <small class="text-muted">
                    {{ __('messages.pending') }}
                </small>

                <h2 class="fw-bold mt-2 mb-0">
                    {{ $pendingOrders }}
                </h2>

            </div>

        </div>


        <!-- Preparing -->
        <div class="col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon bg-info-subtle text-info">
                    👨‍🍳
                </div>

                <small class="text-muted">
                    {{ __('messages.preparing') }}
                </small>

                <h2 class="fw-bold mt-2 mb-0">
                    {{ $preparingOrders }}
                </h2>

            </div>

        </div>


        <!-- Delivered -->
        <div class="col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon bg-success-subtle text-success">
                    ✅
                </div>

                <small class="text-muted">
                    {{ __('messages.delivered') }}
                </small>

                <h2 class="fw-bold mt-2 mb-0">
                    {{ $deliveredOrders }}
                </h2>

            </div>

        </div>

    </div>


    <!-- TOTAL SPENT -->
    <div class="row mb-4">

        <div class="col-12">

            <div class="stat-card">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            {{ __('messages.total') }} {{ __('messages.orders') }}
                        </small>

                        <h2 class="fw-bold text-danger mt-2 mb-0">
                            TZS {{ number_format($totalSpent, 0) }}
                        </h2>

                    </div>

                    <div class="stat-icon bg-danger-subtle text-danger mb-0">
                        💰
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- RECENT ORDERS -->
    <div class="orders-card">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <div>

                <h4 class="fw-bold mb-1">
                    🛒 {{ __('messages.my_orders') }}
                </h4>

                <p class="text-muted mb-0">
                    {{ __('messages.orders_description') }}
                </p>

            </div>

            <a href="{{ route('customer.orders') }}"
               class="btn btn-outline-danger">
                {{ __('messages.view_details') }}
            </a>

        </div>


        @if($recentOrders->count() > 0)

            @foreach($recentOrders as $order)

                <div class="order-row">

                    <div class="row align-items-center">

                        <div class="col-md-3">

                            <strong>
                                #{{ $order->id }}
                            </strong>

                            <div class="small text-muted">
                                {{ $order->created_at->format('d M Y') }}
                            </div>

                        </div>


                        <div class="col-md-3">

                            <strong>
                                TZS {{ number_format($order->total, 0) }}
                            </strong>

                        </div>


                        <div class="col-md-3">

                            @if($order->status === 'pending')

                                <span class="status status-pending">
                                    {{ __('messages.pending') }}
                                </span>

                            @elseif($order->status === 'preparing')

                                <span class="status status-preparing">
                                    {{ __('messages.preparing') }}
                                </span>

                            @elseif($order->status === 'delivered')

                                <span class="status status-delivered">
                                    {{ __('messages.delivered') }}
                                </span>

                            @elseif($order->status === 'cancelled')

                                <span class="status status-cancelled">
                                    {{ __('messages.cancelled') }}
                                </span>

                            @endif

                        </div>


                        <div class="col-md-3 text-md-end mt-2 mt-md-0">

                            <a href="{{ route('customer.order.details', $order->id) }}"
                               class="btn btn-sm btn-outline-primary">

                                {{ __('messages.view_details') }}

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        @else

            <div class="text-center py-5">

                <div style="font-size: 55px;">
                    🛒
                </div>

                <h5 class="fw-bold mt-3">
                    {{ __('messages.no_orders') }}
                </h5>

                <p class="text-muted">
                    {{ __('messages.no_orders_description') }}
                </p>

                <a href="{{ route('home') }}"
                   class="btn btn-danger">

                    {{ __('messages.start_ordering') }}

                </a>

            </div>

        @endif

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>