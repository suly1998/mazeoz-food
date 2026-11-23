<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ __('messages.checkout') }} - Mazeoz Food
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="{{ route('home') }}"
        >
            🍔 Mazeoz Food
        </a>

        <a
            href="{{ route('cart') }}"
            class="btn btn-warning"
        >
            🛒 {{ __('messages.cart') }}
        </a>

    </div>
</nav>


<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold">
            🛍️ {{ __('messages.checkout') }}
        </h1>

        <p class="text-muted">
            {{ __('messages.complete_order_details') }}
        </p>

    </div>


    <div class="row g-4">

        <!-- CUSTOMER INFORMATION -->
        <div class="col-md-7">

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        👤 {{ __('messages.customer_information') }}
                    </h4>


                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <strong>
                                {{ __('messages.fix_errors') }}
                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form
                        method="POST"
                        action="{{ route('checkout.place') }}"
                    >

                        @csrf


                        <!-- NAME -->
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                {{ __('messages.full_name') }}
                            </label>

                            <input
                                type="text"
                                name="customer_name"
                                class="form-control"
                                placeholder="{{ __('messages.enter_full_name') }}"
                                value="{{ old('customer_name', auth()->user()->name) }}"
                                required
                            >

                        </div>


                        <!-- PHONE -->
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                {{ __('messages.phone_number') }}
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                placeholder="Example: 0777123456"
                                value="{{ old('phone', auth()->user()->phone) }}"
                                required
                            >

                        </div>


                        <!-- LOCATION -->
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                {{ __('messages.delivery_location') }}
                            </label>

                            <input
                                type="text"
                                name="location"
                                class="form-control"
                                placeholder="{{ __('messages.enter_delivery_location') }}"
                                value="{{ old('location', auth()->user()->location) }}"
                                required
                            >

                        </div>


                        <!-- NOTES -->
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                {{ __('messages.order_notes') }}
                            </label>

                            <textarea
                                name="notes"
                                class="form-control"
                                rows="4"
                                placeholder="{{ __('messages.special_instructions') }}"
                            >{{ old('notes') }}</textarea>

                        </div>


                        <!-- PAYMENT METHOD -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                💳 {{ __('messages.payment_method') }}
                            </label>


                            <div class="row g-3">


                                <!-- CASH -->
                                <div class="col-md-6">

                                    <div class="form-check border rounded p-3">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="payment_method"
                                            id="cash"
                                            value="cash"
                                            {{ old('payment_method') === 'cash' ? 'checked' : '' }}
                                            required
                                        >

                                        <label
                                            class="form-check-label fw-bold"
                                            for="cash"
                                        >
                                            💵 {{ __('messages.cash_on_delivery') }}
                                        </label>

                                        <div class="small text-muted mt-1">
                                            {{ __('messages.pay_when_delivered') }}
                                        </div>

                                    </div>

                                </div>


                                <!-- MPESA -->
                                <div class="col-md-6">

                                    <div class="form-check border rounded p-3">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="payment_method"
                                            id="mpesa"
                                            value="mpesa"
                                            {{ old('payment_method') === 'mpesa' ? 'checked' : '' }}
                                        >

                                        <label
                                            class="form-check-label fw-bold"
                                            for="mpesa"
                                        >
                                            📱 M-Pesa
                                        </label>

                                        <div class="small text-muted mt-1">
                                            {{ __('messages.pay_with_mpesa') }}
                                        </div>

                                    </div>

                                </div>


                                <!-- AIRTEL MONEY -->
                                <div class="col-md-6">

                                    <div class="form-check border rounded p-3">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="payment_method"
                                            id="airtel_money"
                                            value="airtel_money"
                                            {{ old('payment_method') === 'airtel_money' ? 'checked' : '' }}
                                        >

                                        <label
                                            class="form-check-label fw-bold"
                                            for="airtel_money"
                                        >
                                            📱 Airtel Money
                                        </label>

                                        <div class="small text-muted mt-1">
                                            {{ __('messages.pay_with_airtel') }}
                                        </div>

                                    </div>

                                </div>


                                <!-- TIGO PESA -->
                                <div class="col-md-6">

                                    <div class="form-check border rounded p-3">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="payment_method"
                                            id="tigo_pesa"
                                            value="tigo_pesa"
                                            {{ old('payment_method') === 'tigo_pesa' ? 'checked' : '' }}
                                        >

                                        <label
                                            class="form-check-label fw-bold"
                                            for="tigo_pesa"
                                        >
                                            📱 Tigo Pesa
                                        </label>

                                        <div class="small text-muted mt-1">
                                            {{ __('messages.pay_with_tigo') }}
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- SUBMIT -->
                        <button
                            type="submit"
                            class="btn btn-success w-100 py-3 fw-bold"
                        >
                            🛍️ {{ __('messages.place_order') }}
                        </button>

                    </form>

                </div>

            </div>

        </div>


        <!-- ORDER SUMMARY -->
        <div class="col-md-5">

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        🧾 {{ __('messages.order_summary') }}
                    </h4>


                    @foreach ($cart as $item)

                        <div class="d-flex justify-content-between mb-3">

                            <div>

                                <h6 class="mb-1">
                                    {{ $item['name'] }}
                                </h6>

                                <small class="text-muted">

                                    {{ $item['quantity'] }}
                                    ×
                                    TZS {{ number_format($item['price']) }}

                                </small>

                            </div>


                            <strong>

                                TZS
                                {{ number_format($item['price'] * $item['quantity']) }}

                            </strong>

                        </div>

                    @endforeach


                    <hr>


                    <div class="d-flex justify-content-between">

                        <h5 class="fw-bold">
                            {{ __('messages.total') }}
                        </h5>

                        <h5 class="fw-bold text-success">

                            TZS {{ number_format($total) }}

                        </h5>

                    </div>


                    <a
                        href="{{ route('cart') }}"
                        class="btn btn-outline-dark w-100 mt-3"
                    >
                        ← {{ __('messages.back_to_cart') }}
                    </a>

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