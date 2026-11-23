<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>My Orders - Mazeoz Food</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f5f6f8;
        }

        .navbar {
            height: 65px;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 21px;
        }

        .dashboard-wrapper {
            min-height: calc(100vh - 65px);
        }

        .sidebar {
            background: #212529;
            min-height: calc(100vh - 65px);
            padding: 25px 15px;
        }

        .profile-mini {
            text-align: center;
            color: white;
            padding: 15px 10px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            margin-bottom: 20px;
        }

        .profile-avatar {
            width: 75px;
            height: 75px;
            background: white;
            color: #212529;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 12px;
        }

        .profile-mini h6 {
            margin-bottom: 3px;
            font-weight: 700;
        }

        .profile-mini small {
            color: #adb5bd;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-menu a,
        .sidebar-menu button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border-radius: 10px;
            color: #dee2e6;
            text-decoration: none;
            border: none;
            background: transparent;
            text-align: left;
            transition: 0.2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu button:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .sidebar-menu .active {
            background: white;
            color: #212529;
            font-weight: 600;
        }

        .sidebar-menu .logout-button {
            color: #ffb3b3;
        }

        .sidebar-menu .logout-button:hover {
            background: #dc3545;
            color: white;
        }

        .main-content {
            padding: 35px;
        }

        .page-title {
            font-weight: 800;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: #6c757d;
            margin-bottom: 30px;
        }

        .order-card {
            border: none;
            border-radius: 16px;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
            margin-bottom: 18px;
        }

        .order-card .card-body {
            padding: 25px;
        }

        .order-number {
            font-size: 18px;
            font-weight: 800;
        }

        .order-date {
            color: #6c757d;
            font-size: 14px;
            margin-top: 5px;
        }

        .order-total {
            font-size: 19px;
            font-weight: 800;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
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

        .status-paid {
            background: #d1e7dd;
            color: #0f5132;
        }

        .status-payment-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-failed {
            background: #f8d7da;
            color: #842029;
        }

        .status-unknown {
            background: #e2e3e5;
            color: #41464b;
        }

        .empty-orders {
            background: white;
            border-radius: 16px;
            padding: 70px 20px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }

        .empty-icon {
            font-size: 65px;
        }

        .view-button {
            border-radius: 9px;
            font-weight: 600;
        }

        @media (max-width: 991px) {

            .sidebar {
                min-height: auto;
                padding: 15px;
            }

            .main-content {
                padding: 20px;
            }

        }

    </style>

</head>


<body>


{{-- ====================================================== --}}
{{-- TOP NAVBAR --}}
{{-- ====================================================== --}}

<nav class="navbar navbar-dark bg-dark">

    <div class="container-fluid px-4">

        <a
            class="navbar-brand"
            href="{{ route('home') }}"
        >
            🍔 Mazeoz Food
        </a>


        <a
            href="{{ route('home') }}"
            class="btn btn-outline-light btn-sm"
        >
            🏠 {{ __('messages.visit_website') }}
        </a>

    </div>

</nav>



{{-- ====================================================== --}}
{{-- DASHBOARD --}}
{{-- ====================================================== --}}

<div class="container-fluid">

    <div class="row dashboard-wrapper">


        {{-- ================================================== --}}
        {{-- SIDEBAR --}}
        {{-- ================================================== --}}

        <div class="col-lg-3 col-xl-2 px-0">

            <aside class="sidebar">


                {{-- {{ __('messages.customer') }} Mini Profile --}}

                <div class="profile-mini">

                    <div class="profile-avatar">
                        👤
                    </div>

                    <h6>
                        {{ auth()->user()->name }}
                    </h6>

                    <small>
                        {{ __('messages.customer_account') }}
                    </small>

                </div>



                {{-- Sidebar Menu --}}

                <ul class="sidebar-menu">


                    {{-- Dashboard --}}

                    <li>

                        <a
                            href="{{ route('customer.profile') }}"
                        >
                            🏠
                            <span>{{ __('messages.dashboard') }}</span>
                        </a>

                    </li>


                    {{-- My Profile --}}

                    <li>

                        <a
                            href="{{ route('customer.profile') }}"
                        >
                            👤
                            <span>{{ __('messages.my_profile') }}</span>
                        </a>

                    </li>


                    {{-- My Orders --}}

                    <li>

                        <a
                            href="{{ route('customer.orders') }}"
                            class="active"
                        >
                            🛒
                            <span>{{ __('messages.my_orders') }}</span>
                        </a>

                    </li>


                    {{-- Change Password --}}

                    <li>

                        <a
                            href="{{ route('customer.password') }}"
                        >
                            🔐
                            <span>{{ __('messages.change_password') }}</span>
                        </a>

                    </li>


                    {{-- Delivery Address --}}

                    <li>

                        <a href="{{ route('customer.address') }}">
                            📍
                            <span>{{ __('messages.delivery_address') }}</span>
                        </a>

                    </li>


                    {{-- Settings --}}

                    <li>

                        <a href="{{ route('customer.settings') }}">
                            ⚙️
                            <span>{{ __('messages.settings') }}</span>
                        </a>

                    </li>


                    {{-- Logout --}}

                    <li class="mt-4">

                        <form
                            action="{{ route('customer.logout') }}"
                            method="POST"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="logout-button"
                                onclick="return confirm('Are you sure you want to logout?');"
                            >
                                🚪
                                <span>{{ __('messages.logout') }}</span>
                            </button>

                        </form>

                    </li>

                </ul>

            </aside>

        </div>



        {{-- ================================================== --}}
        {{-- MAIN CONTENT --}}
        {{-- ================================================== --}}

        <div class="col-lg-9 col-xl-10">

            <main class="main-content">


                {{-- Page Header --}}

                <div class="mb-4">

                    <h2 class="page-title">
                        🛒 {{ __('messages.my_orders_title') }}
                    </h2>

                    <p class="page-subtitle">
                        {{ __('messages.orders_description') }}
                    </p>

                </div>



                {{-- Success Message --}}

                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                        ></button>

                    </div>

                @endif



                {{-- Error Message --}}

                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible fade show">

                        {{ session('error') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                        ></button>

                    </div>

                @endif



                {{-- ================================================== --}}
                {{-- ORDERS --}}
                {{-- ================================================== --}}

                @if($orders->count() > 0)


                    @foreach($orders as $order)

                        <div class="card order-card">

                            <div class="card-body">

                                <div class="row align-items-center">


                                    {{-- Order Number --}}

                                    <div class="col-lg-3">

                                        <div class="order-number">

                                            Order #{{ $order->id }}

                                        </div>

                                        <div class="order-date">

                                            {{ $order->created_at->format('d M Y, h:i A') }}

                                        </div>

                                    </div>



                                    {{-- Customer --}}

                                    <div class="col-lg-3 mt-3 mt-lg-0">

                                        <small class="text-muted d-block">
                                            Customer
                                        </small>

                                        <strong>
                                            {{ $order->customer_name }}
                                        </strong>

                                    </div>



                                    {{-- {{ __('messages.total') }} --}}

                                    <div class="col-lg-2 mt-3 mt-lg-0">

                                        <small class="text-muted d-block">
                                            Total
                                        </small>

                                        <div class="order-total">

                                            TZS {{ number_format($order->total, 0) }}

                                        </div>

                                    </div>



                                    {{-- Order Status and Payment Status --}}

                                    <div class="col-lg-2 mt-3 mt-lg-0">

                                        <small class="text-muted d-block mb-2">Order Status</small>

                                        @if($order->status === 'pending')
                                            <span class="status status-pending">🟡 {{ __('messages.pending') }}</span>
                                        @elseif($order->status === 'preparing')
                                            <span class="status status-preparing">🔵 {{ __('messages.preparing') }}</span>
                                        @elseif($order->status === 'delivered')
                                            <span class="status status-delivered">🟢 {{ __('messages.delivered') }}</span>
                                        @elseif($order->status === 'cancelled')
                                            <span class="status status-cancelled">🔴 {{ __('messages.cancelled') }}</span>
                                        @else
                                            <span class="status status-unknown">{{ ucfirst($order->status ?? 'Unknown') }}</span>
                                        @endif

                                        <div class="mt-3">
                                            <small class="text-muted d-block mb-2">Payment Status</small>

                                            @php
                                                $paymentStatus = $order->payment_status ?? 'pending';
                                            @endphp

                                            @if($paymentStatus === 'paid')
                                                <span class="status status-paid">🟢 Paid</span>
                                            @elseif($paymentStatus === 'failed')
                                                <span class="status status-failed">🔴 Failed</span>
                                            @elseif($paymentStatus === 'pending')
                                                <span class="status status-payment-pending">🟡 Pending</span>
                                            @else
                                                <span class="status status-unknown">{{ ucfirst($paymentStatus) }}</span>
                                            @endif
                                        </div>

                                    </div>



                                    {{-- View Details --}}

                                    <div class="col-lg-2 mt-3 mt-lg-0 text-lg-end">

                                        <a
                                            href="{{ route('customer.order.details', $order->id) }}"
                                            class="btn btn-primary btn-sm view-button"
                                        >
                                            {{ __('messages.view_details') }} →
                                        </a>

                                    </div>


                                </div>

                            </div>

                        </div>

                    @endforeach


                @else


                    {{-- No Orders --}}

                    <div class="empty-orders">

                        <div class="empty-icon">
                            🛒
                        </div>

                        <h4 class="mt-3 fw-bold">
                            {{ __('messages.no_orders') }}
                        </h4>

                        <p class="text-muted">
                            {{ __('messages.no_orders_description') }}
                        </p>

                        <a
                            href="{{ route('home') }}"
                            class="btn btn-primary"
                        >
                            🍔 {{ __('messages.start_ordering') }}
                        </a>

                    </div>


                @endif


            </main>

        </div>

    </div>

</div>



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>