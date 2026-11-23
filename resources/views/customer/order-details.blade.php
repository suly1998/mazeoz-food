
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - Mazeoz Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background: #212529;
        }
        .page-header {
            background: linear-gradient(135deg, #212529, #495057);
            color: white;
            border-radius: 16px;
            padding: 28px;
        }
        .info-card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0,0,0,.05);
            height: 100%;
        }
        .info-label {
            color: #6c757d;
            font-size: 13px;
            margin-bottom: 5px;
        }
        .info-value {
            font-weight: 600;
            overflow-wrap: anywhere;
        }
        .section-title {
            font-weight: 700;
        }
        .food-image {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 9px;
        }
        .status-badge {
            font-size: 13px;
            padding: 8px 12px;
        }
        .total-box {
            background: #fff8e8;
            border-radius: 12px;
            padding: 18px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand fw-bold">
            🍔 Mazeoz Food
        </a>

        <a href="{{ route('customer.orders') }}"
           class="btn btn-outline-light btn-sm">
            My Orders
        </a>
    </div>
</nav>

<main class="container py-4 py-md-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="page-header mb-4">
        <div class="d-flex flex-wrap justify-content-between gap-3 align-items-center">
            <div>
                <p class="mb-2 text-white-50">CUSTOMER ACCOUNT</p>
                <h2 class="fw-bold mb-2">Order Details</h2>
                <p class="mb-0">
                    Review your order, food items and payment information.
                </p>
            </div>

            <div class="text-md-end">
                <div class="text-white-50 small">Order Number</div>
                <h3 class="fw-bold mb-0">#{{ $order->id }}</h3>
            </div>
        </div>
    </div>

    @php
        $orderStatuses = [
            'pending' => ['Pending', 'warning'],
            'preparing' => ['Preparing', 'primary'],
            'delivered' => ['Delivered', 'success'],
            'cancelled' => ['Cancelled', 'danger'],
        ];

        $paymentStatuses = [
            'pending' => ['Pending', 'warning'],
            'paid' => ['Paid', 'success'],
            'failed' => ['Failed', 'danger'],
        ];

        $paymentMethods = [
            'cash' => 'Cash on Delivery',
            'mpesa' => 'M-Pesa',
            'airtel_money' => 'Airtel Money',
            'tigo_pesa' => 'Tigo Pesa',
        ];

        $currentOrderStatus = $orderStatuses[$order->status]
            ?? [ucfirst($order->status ?? 'Unknown'), 'secondary'];

        $currentPaymentStatus = $paymentStatuses[$order->payment_status ?? 'pending']
            ?? ['Unknown', 'secondary'];

        $currentPaymentMethod = $paymentMethods[$order->payment_method ?? 'cash']
            ?? ucfirst($order->payment_method ?? 'Not specified');
    @endphp

    <div class="row g-4 mb-4">

        <div class="col-lg-6">
            <div class="card info-card">
                <div class="card-body p-4">
                    <h5 class="section-title mb-4">📋 Order Information</h5>

                    <div class="mb-3">
                        <div class="info-label">Order Number</div>
                        <div class="info-value">#{{ $order->id }}</div>
                    </div>

                    <div class="mb-3">
                        <div class="info-label">Order Date</div>
                        <div class="info-value">
                            {{ $order->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="info-label">Order Status</div>
                        <span class="badge bg-{{ $currentOrderStatus[1] }} status-badge">
                            {{ $currentOrderStatus[0] }}
                        </span>
                    </div>

                    <div>
                        <div class="info-label">Delivery Location</div>
                        <div class="info-value">
                            {{ $order->location ?? 'Not provided' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card info-card">
                <div class="card-body p-4">
                    <h5 class="section-title mb-4">💳 Payment Information</h5>

                    <div class="mb-3">
                        <div class="info-label">Payment Method</div>
                        <div class="info-value">
                            {{ $currentPaymentMethod }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="info-label">Payment Status</div>
                        <span class="badge bg-{{ $currentPaymentStatus[1] }} status-badge">
                            {{ $currentPaymentStatus[0] }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <div class="info-label">Transaction Reference</div>
                        <div class="info-value">
                            {{ $order->transaction_reference ?: 'Not available' }}
                        </div>
                    </div>

                    <div class="total-box">
                        <div class="info-label">Total Amount</div>
                        <h3 class="fw-bold mb-0">
                            TZS {{ number_format((float) $order->total, 0) }}
                        </h3>
                    </div>

                    @if(($order->payment_method ?? 'cash') !== 'cash'
                        && ($order->payment_status ?? 'pending') === 'pending')
                        <div class="alert alert-info mt-3 mb-0 small">
                            Your payment is awaiting confirmation. Please contact
                            Mazeoz Food if you need assistance.
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <div class="card info-card mb-4">
        <div class="card-body p-4">
            <h5 class="section-title mb-4">🍽️ Ordered Food</h5>

            @if($order->items->isNotEmpty())
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Food</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        <div class="fw-semibold">
                                            {{ $item->food_name ?? $item->food?->name ?? 'Food item' }}
                                        </div>
                                    </td>
                                    <td>
                                        TZS {{ number_format((float) $item->price, 0) }}
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td class="text-end fw-semibold">
                                        TZS {{ number_format((float) $item->subtotal, 0) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end fw-bold">
                                    Order Total
                                </td>
                                <td class="text-end fw-bold">
                                    TZS {{ number_format((float) $order->total, 0) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @else
                <div class="alert alert-info mb-0">
                    No food items were found for this order.
                </div>
            @endif
        </div>
    </div>

    @if($order->notes)
        <div class="card info-card mb-4">
            <div class="card-body p-4">
                <h5 class="section-title mb-3">📝 Order Notes</h5>
                <p class="mb-0">{{ $order->notes }}</p>
            </div>
        </div>
    @endif

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('customer.orders') }}" class="btn btn-dark">
            ← Back to My Orders
        </a>

        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
            Continue Shopping
        </a>
    </div>

</main>

<footer class="text-center text-secondary py-4">
    <small>© {{ date('Y') }} Mazeoz Food. All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
