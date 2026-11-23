<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Order #{{ $order->id }} - Mazeoz Food
    </title>

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
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background-color: #343a40;
        }

        .card {
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


            <a href="{{ route('home') }}">
                🏠 View Website
            </a>

        </div>



        {{-- ========================= --}}
        {{-- MAIN CONTENT --}}
        {{-- ========================= --}}

        <div class="col-md-10 p-4">


            {{-- Header --}}

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold">
                        Order #{{ $order->id }}
                    </h2>

                    <p class="text-muted">
                        Order details and customer information
                    </p>

                </div>


                <a
                    href="{{ route('admin.dashboard') }}"
                    class="btn btn-dark"
                >
                    ← Back to Dashboard
                </a>

            </div>



            {{-- Success Message --}}

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



            <div class="row g-4">


                {{-- ========================= --}}
                {{-- CUSTOMER INFORMATION --}}
                {{-- ========================= --}}

                <div class="col-md-5">

                    <div class="card shadow-sm">

                        <div class="card-body p-4">

                            <h5 class="fw-bold mb-4">
                                👤 Customer Information
                            </h5>


                            <div class="mb-3">

                                <small class="text-muted">
                                    Full Name
                                </small>

                                <div class="fw-bold">
                                    {{ $order->customer_name }}
                                </div>

                            </div>


                            <div class="mb-3">

                                <small class="text-muted">
                                    Phone
                                </small>

                                <div class="fw-bold">
                                    {{ $order->phone }}
                                </div>

                            </div>


                            <div class="mb-3">

                                <small class="text-muted">
                                    Delivery Location
                                </small>

                                <div class="fw-bold">
                                    {{ $order->location }}
                                </div>

                            </div>


                            <div class="mb-3">

                                <small class="text-muted">
                                    Order Notes
                                </small>

                                <div>

                                    @if ($order->notes)

                                        {{ $order->notes }}

                                    @else

                                        <span class="text-muted">
                                            No notes
                                        </span>

                                    @endif

                                </div>

                            </div>


                            <div>

                                <small class="text-muted">
                                    Order Date
                                </small>

                                <div class="fw-bold">
                                    {{ $order->created_at->format('d M Y H:i') }}
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ========================= --}}
                    {{-- PAYMENT INFORMATION --}}
                    {{-- ========================= --}}

                    <div class="card shadow-sm mt-4">

                        <div class="card-body p-4">

                            <h5 class="fw-bold mb-4">
                                💳 Payment Information
                            </h5>


                            {{-- Payment Method --}}

                            <div class="mb-4">

                                <small class="text-muted">
                                    Payment Method
                                </small>

                                <div class="mt-2">

                                    @if ($order->payment_method === 'cash')

                                        <span class="badge bg-success fs-6">
                                            💵 Cash on Delivery
                                        </span>

                                    @elseif ($order->payment_method === 'mpesa')

                                        <span class="badge bg-primary fs-6">
                                            📱 M-Pesa
                                        </span>

                                    @elseif ($order->payment_method === 'airtel_money')

                                        <span class="badge bg-danger fs-6">
                                            📱 Airtel Money
                                        </span>

                                    @elseif ($order->payment_method === 'tigo_pesa')

                                        <span class="badge bg-info text-dark fs-6">
                                            📱 Tigo Pesa
                                        </span>

                                    @else

                                        <span class="badge bg-secondary fs-6">
                                            Unknown
                                        </span>

                                    @endif

                                </div>

                            </div>


                            {{-- Current Payment Status --}}

                            <div class="mb-4">

                                <small class="text-muted">
                                    Current Payment Status
                                </small>

                                <div class="mt-2">

                                    @if ($order->payment_status === 'pending')

                                        <span class="badge bg-warning text-dark fs-6">
                                            ⏳ Pending
                                        </span>

                                    @elseif ($order->payment_status === 'paid')

                                        <span class="badge bg-success fs-6">
                                            ✅ Paid
                                        </span>

                                    @elseif ($order->payment_status === 'failed')

                                        <span class="badge bg-danger fs-6">
                                            ❌ Failed
                                        </span>

                                    @else

                                        <span class="badge bg-secondary fs-6">
                                            Unknown
                                        </span>

                                    @endif

                                </div>

                            </div>


                            {{-- Change Payment Status --}}

                            <form
                                method="POST"
                                action="{{ route('admin.order.payment.status', $order->id) }}"
                            >

                                @csrf


                                <label class="form-label fw-bold">
                                    Change Payment Status
                                </label>


                                <select
                                    name="payment_status"
                                    class="form-select mb-3"
                                    required
                                >

                                    <option
                                        value="pending"
                                        {{ $order->payment_status === 'pending' ? 'selected' : '' }}
                                    >
                                        ⏳ Pending
                                    </option>


                                    <option
                                        value="paid"
                                        {{ $order->payment_status === 'paid' ? 'selected' : '' }}
                                    >
                                        ✅ Paid
                                    </option>


                                    <option
                                        value="failed"
                                        {{ $order->payment_status === 'failed' ? 'selected' : '' }}
                                    >
                                        ❌ Failed
                                    </option>

                                </select>


                                <button
                                    type="submit"
                                    class="btn btn-success w-100"
                                >
                                    💳 Update Payment Status
                                </button>

                            </form>

                        </div>

                    </div>

                </div>



                {{-- ========================= --}}
                {{-- ORDER STATUS --}}
                {{-- ========================= --}}

                <div class="col-md-7">

                    <div class="card shadow-sm">

                        <div class="card-body p-4">

                            <h5 class="fw-bold mb-4">
                                📦 Order Status
                            </h5>


                            {{-- Current Status --}}

                            <div class="mb-4">

                                <p class="text-muted mb-2">
                                    Current Status
                                </p>


                                @if ($order->status === 'pending')

                                    <span class="badge bg-warning text-dark fs-6">
                                        ⏳ Pending
                                    </span>

                                @elseif ($order->status === 'preparing')

                                    <span class="badge bg-info text-dark fs-6">
                                        👨‍🍳 Preparing
                                    </span>

                                @elseif ($order->status === 'delivered')

                                    <span class="badge bg-success fs-6">
                                        🚚 Delivered
                                    </span>

                                @elseif ($order->status === 'cancelled')

                                    <span class="badge bg-danger fs-6">
                                        ❌ Cancelled
                                    </span>

                                @endif

                            </div>



                            {{-- Change Status Form --}}

                            <form
                                method="POST"
                                action="{{ route('admin.order.status', $order->id) }}"
                            >

                                @csrf


                                <label class="form-label fw-bold">
                                    Change Order Status
                                </label>


                                <select
                                    name="status"
                                    class="form-select mb-3"
                                    required
                                >

                                    <option
                                        value="pending"
                                        {{ $order->status === 'pending' ? 'selected' : '' }}
                                    >
                                        ⏳ Pending
                                    </option>


                                    <option
                                        value="preparing"
                                        {{ $order->status === 'preparing' ? 'selected' : '' }}
                                    >
                                        👨‍🍳 Preparing
                                    </option>


                                    <option
                                        value="delivered"
                                        {{ $order->status === 'delivered' ? 'selected' : '' }}
                                    >
                                        🚚 Delivered
                                    </option>


                                    <option
                                        value="cancelled"
                                        {{ $order->status === 'cancelled' ? 'selected' : '' }}
                                    >
                                        ❌ Cancelled
                                    </option>

                                </select>


                                <button
                                    type="submit"
                                    class="btn btn-primary w-100"
                                >
                                    🔄 Update Order Status
                                </button>

                            </form>

                        </div>

                    </div>



                    {{-- ========================= --}}
                    {{-- ORDERED FOODS --}}
                    {{-- ========================= --}}

                    <div class="card shadow-sm mt-4">

                        <div class="card-body p-4">

                            <h5 class="fw-bold mb-4">
                                🍔 Ordered Foods
                            </h5>


                            <div class="table-responsive">

                                <table class="table align-middle">

                                    <thead class="table-dark">

                                        <tr>

                                            <th>
                                                Food
                                            </th>

                                            <th>
                                                Price
                                            </th>

                                            <th>
                                                Quantity
                                            </th>

                                            <th>
                                                Subtotal
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        @forelse ($order->items as $item)

                                            <tr>

                                                <td class="fw-bold">
                                                    {{ $item->food_name }}
                                                </td>


                                                <td>
                                                    TZS {{ number_format($item->price) }}
                                                </td>


                                                <td>
                                                    {{ $item->quantity }}
                                                </td>


                                                <td class="fw-bold">
                                                    TZS {{ number_format($item->subtotal) }}
                                                </td>

                                            </tr>

                                        @empty

                                            <tr>

                                                <td
                                                    colspan="4"
                                                    class="text-center text-muted py-4"
                                                >
                                                    No items found for this order.
                                                </td>

                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>


                            <hr>


                            {{-- Total --}}

                            <div class="d-flex justify-content-between">

                                <h5 class="fw-bold">
                                    Total
                                </h5>


                                <h5 class="fw-bold text-success">

                                    TZS {{ number_format($order->total) }}

                                </h5>

                            </div>

                        </div>

                    </div>

                </div>


            </div>


        </div>

    </div>

</div>



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>