<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ app()->getLocale() === 'sw' ? 'Kikapu - Mazeoz Food' : 'Cart - Mazeoz Food' }}
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        .cart-image {
            width: 120px;
            height: 100px;
            object-fit: cover;
        }

        .quantity-box {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quantity-number {
            min-width: 35px;
            text-align: center;
            font-weight: bold;
        }

        .checkout-btn {
            font-size: 17px;
            font-weight: bold;
        }

    </style>

</head>


<body>


{{-- ====================================================== --}}
{{-- NAVBAR --}}
{{-- ====================================================== --}}

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="{{ route('home') }}"
        >
            🍔 Mazeoz Food
        </a>


        <a
            href="{{ route('home') }}"
            class="btn btn-warning"
        >
            {{ __('messages.continue_shopping') }}
        </a>

    </div>

</nav>



{{-- ====================================================== --}}
{{-- MAIN CONTENT --}}
{{-- ====================================================== --}}

<div class="container py-5">


    {{-- ================================================== --}}
    {{-- PAGE TITLE --}}
    {{-- ================================================== --}}

    <h2 class="fw-bold mb-4">
        🛒 {{ __('messages.your_cart') }}
    </h2>



    {{-- ================================================== --}}
    {{-- SUCCESS MESSAGE --}}
    {{-- ================================================== --}}

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



    {{-- ================================================== --}}
    {{-- ERROR MESSAGE --}}
    {{-- ================================================== --}}

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
    {{-- CART WITH ITEMS --}}
    {{-- ================================================== --}}

    @if(count($cart) > 0)

        <div class="row">


            {{-- ================================================== --}}
            {{-- LEFT SIDE - CART ITEMS --}}
            {{-- ================================================== --}}

            <div class="col-md-8">

                @foreach($cart as $id => $item)

                    <div class="card mb-3 shadow-sm">

                        <div class="card-body">

                            <div class="row align-items-center">


                                {{-- ============================== --}}
                                {{-- FOOD IMAGE --}}
                                {{-- ============================== --}}

                                <div class="col-md-3">

                                    @if(!empty($item['image']))

                                        <img
                                            src="{{ asset('images/' . $item['image']) }}"
                                            class="img-fluid rounded cart-image"
                                            alt="{{ $item['name'] }}"
                                        >

                                    @else

                                        <div
                                            class="cart-image bg-secondary rounded d-flex align-items-center justify-content-center text-white"
                                        >
                                            🍽️
                                        </div>

                                    @endif

                                </div>



                                {{-- ============================== --}}
                                {{-- FOOD DETAILS --}}
                                {{-- ============================== --}}

                                <div class="col-md-5">

                                    <h5 class="fw-bold">
                                        {{ $item['name'] }}
                                    </h5>


                                    <p class="text-muted mb-2">

                                        TZS
                                        {{ number_format($item['price']) }}

                                    </p>



                                    {{-- ========================== --}}
                                    {{-- QUANTITY --}}
                                    {{-- ========================== --}}

                                    <div class="quantity-box">

                                        <span class="me-2">
                                            {{ __('messages.quantity') }}:
                                        </span>


                                        {{-- DECREASE --}}
                                        <a
                                            href="{{ route('cart.decrease', $id) }}"
                                            class="btn btn-sm btn-outline-secondary"
                                        >
                                            −
                                        </a>


                                        {{-- NUMBER --}}
                                        <span class="quantity-number">
                                            {{ $item['quantity'] }}
                                        </span>


                                        {{-- INCREASE --}}
                                        <a
                                            href="{{ route('cart.increase', $id) }}"
                                            class="btn btn-sm btn-outline-secondary"
                                        >
                                            +
                                        </a>

                                    </div>



                                    {{-- ========================== --}}
                                    {{-- REMOVE --}}
                                    {{-- ========================== --}}

                                    <a
                                        href="{{ route('cart.remove', $id) }}"
                                        class="btn btn-sm btn-danger mt-3"
                                    >
                                        🗑️ {{ __('messages.remove') }}
                                    </a>

                                </div>



                                {{-- ============================== --}}
                                {{-- ITEM TOTAL --}}
                                {{-- ============================== --}}

                                <div
                                    class="col-md-4 text-md-end mt-3 mt-md-0"
                                >

                                    <small class="text-muted">
                                        {{ __('messages.item_total') }}
                                    </small>

                                    <h5 class="text-success fw-bold">

                                        TZS
                                        {{ number_format(
                                            $item['price'] * $item['quantity']
                                        ) }}

                                    </h5>

                                </div>


                            </div>

                        </div>

                    </div>

                @endforeach

            </div>



            {{-- ================================================== --}}
            {{-- RIGHT SIDE - ORDER SUMMARY --}}
            {{-- ================================================== --}}

            <div class="col-md-4">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h4 class="fw-bold">
                            {{ __('messages.order_summary') }}
                        </h4>


                        <hr>



                        {{-- ============================== --}}
                        {{-- TOTAL --}}
                        {{-- ============================== --}}

                        <div
                            class="d-flex justify-content-between align-items-center"
                        >

                            <span class="fw-bold">
                                {{ __('messages.total') }}
                            </span>


                            <strong class="text-success fs-5">

                                TZS
                                {{ number_format($total) }}

                            </strong>

                        </div>



                        {{-- ============================== --}}
                        {{-- CHECKOUT --}}
                        {{-- ============================== --}}

                        <a
                            href="{{ route('checkout') }}"
                            class="btn btn-success w-100 mt-4 checkout-btn"
                        >
                            {{ __('messages.checkout') }} 🛍️
                        </a>



                        {{-- ============================== --}}
                        {{-- CONTINUE SHOPPING --}}
                        {{-- ============================== --}}

                        <a
                            href="{{ route('home') }}"
                            class="btn btn-outline-dark w-100 mt-2"
                        >
                            {{ __('messages.continue_shopping') }}
                        </a>

                    </div>

                </div>

            </div>

        </div>



    {{-- ====================================================== --}}
    {{-- EMPTY CART --}}
    {{-- ====================================================== --}}

    @else

        <div class="card shadow-sm">

            <div class="card-body text-center py-5">

                <div style="font-size: 60px;">
                    🛒
                </div>


                <h4 class="fw-bold mt-3">
                    {{ __('messages.empty_cart') }}
                </h4>


                <p class="text-muted">
                    {{ __('messages.empty_cart_message') }}
                </p>


                <a
                    href="{{ route('home') }}"
                    class="btn btn-dark"
                >
                    {{ __('messages.browse_food') }} 🍔
                </a>

            </div>

        </div>

    @endif

</div>



{{-- ====================================================== --}}
{{-- BOOTSTRAP JS --}}
{{-- ====================================================== --}}

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>