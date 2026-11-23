```blade
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Orders - Mazeoz Food</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f5f6f8;
            font-family: Arial, sans-serif;
        }

        .top-navbar {
            height: 65px;
            background: #212529;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
            color: white;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .sidebar {
            width: 250px;
            min-height: calc(100vh - 65px);
            background: #212529;
            position: fixed;
            left: 0;
            top: 65px;
            padding: 20px 15px;
        }

        .sidebar-profile {
            text-align: center;
            color: white;
            padding-bottom: 20px;
            border-bottom: 1px solid #495057;
            margin-bottom: 15px;
        }

        .profile-icon {
            width: 65px;
            height: 65px;
            background: #343a40;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 30px;
        }

        .sidebar .nav-link {
            color: #ced4da;
            padding: 12px 15px;
            margin-bottom: 5px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .sidebar .nav-link:hover {
            background: #343a40;
            color: white;
        }

        .sidebar .nav-link.active {
            background: #0d6efd;
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 35px;
        }

        .page-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .order-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 18px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
        }

        .order-number {
            font-size: 18px;
            font-weight: bold;
        }

        .order-date {
            color: #6c757d;
            font-size: 14px;
        }

        .status {
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
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

        .empty-orders {
            background: white;
            border-radius: 12px;
            padding: 60px 20px;
            text-align: center;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
        }

        @media (max-width: 768px) {

            .sidebar {
                width: 100%;
                position: relative;
                top: 0;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .top-navbar {
                padding: 0 15px;
            }
        }
    </style>
</head>

<body>

    <!-- TOP NAVBAR -->
    <div class="top-navbar">

        <div class="brand">
            🍴 Mazeoz Food
        </div>

        <a href="{{ route('home') }}" class="btn btn-light btn-sm">
            🌐 Visit Website
        </a>

    </div>


    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="sidebar-profile">

            <div class="profile-icon">
                👤
            </div>

            <strong>{{ auth()->user()->name }}</strong>

            <div class="small text-secondary mt-1">
                Customer
            </div>

        </div>


        <nav>

            <!-- Dashboard -->
            <a href="{{ route('customer.profile') }}"
                class="nav-link">
                🏠 Dashboard
            </a>


            <!-- My Profile -->
            <a href="{{ route('customer.profile') }}"
                class="nav-link">
                👤 My Profile
            </a>


            <!-- My Orders -->
            <a href="{{ route('customer.orders') }}"
                class="nav-link active">
                🛒 My Orders
            </a>


            <!-- Change Password -->
            <a href="{{ route('customer.password') }}"
                class="nav-link">
                🔐 Change Password
            </a>


            <!-- Delivery Address -->
            <a href="#"
                class="nav-link">
                📍 Delivery Address
            </a>


            <!-- Settings -->
            <a href="#"
                class="nav-link">
                ⚙️ Settings
            </a>


            <!-- Logout -->
            <form action="{{ route('customer.logout') }}"
                method="POST"
                class="mt-2">

                @csrf

                <button type="submit"
                    class="nav-link border-0 bg-transparent w-100 text-start"
                    onclick="return confirm('Are you sure you want to logout?');">

                    🚪 Logout

                </button>

            </form>

        </nav>

    </div>


    <!-- MAIN CONTENT -->
    <div class="main-content">

        <div class="mb-4">

            <h2 class="page-title">
                🛒 My Orders
            </h2>

            <p class="text-muted">
                View and track all your food orders.
            </p>

        </div>


        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

        @endif


        @if($orders->count() > 0)

            @foreach($orders as $order)

                <div class="order-card">

                    <div class="row align-items-center">

                        <!-- ORDER INFO -->
                        <div class="col-md-4">

                            <div class="order-number">
                                Order #{{ $order->id }}
                            </div>

                            <div class="order-date">
                                {{ $order->created_at->format('d M Y, h:i A') }}
                            </div>

                        </div>


                        <!-- TOTAL -->
                        <div class="col-md-3 mt-3 mt-md-0">

                            <small class="text-muted d-block">
                                Total Amount
                            </small>

                            <strong class="fs-5">
                                TZS {{ number_format($order->total, 0) }}
                            </strong>

                        </div>


                        <!-- STATUS -->
                        <div class="col-md-2 mt-3 mt-md-0">

                            @if($order->status === 'pending')

                                <span class="status status-pending">
                                    🟡 Pending
                                </span>

                            @elseif($order->status === 'preparing')

                                <span class="status status-preparing">
                                    🔵 Preparing
                                </span>

                            @elseif($order->status === 'delivered')

                                <span class="status status-delivered">
                                    🟢 Delivered
                                </span>

                            @elseif($order->status === 'cancelled')

                                <span class="status status-cancelled">
                                    🔴 Cancelled
                                </span>

                            @endif

                        </div>


                        <!-- DETAILS -->
                        <div class="col-md-3 mt-3 mt-md-0 text-md-end">

                            <a href="{{ route('customer.order.details', $order->id) }}"
                                class="btn btn-primary btn-sm">

                                View Details →

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        @else

            <div class="empty-orders">

                <div style="font-size: 60px;">
                    🛒
                </div>

                <h4 class="mt-3">
                    No Orders Yet
                </h4>

                <p class="text-muted">
                    You haven't placed any food orders yet.
                </p>

                <a href="{{ route('home') }}"
                    class="btn btn-primary">

                    🍔 Order Food

                </a>

            </div>

        @endif

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
```