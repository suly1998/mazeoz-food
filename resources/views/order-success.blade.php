<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Order Successful - Mazeoz Food</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f8f9fa;
        }

        .success-card {
            max-width: 650px;
            margin: 80px auto;
        }

        .success-icon {
            font-size: 80px;
        }

    </style>

</head>


<body>


{{-- Navbar --}}
<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="{{ route('home') }}"
        >
            🍔 Mazeoz Food
        </a>

    </div>

</nav>



{{-- Success Message --}}
<div class="container">

    <div class="card shadow success-card">

        <div class="card-body text-center p-5">


            {{-- Success Icon --}}
            <div class="success-icon">
                ✅
            </div>



            {{-- Title --}}
            <h1 class="fw-bold text-success mt-3">
                Order Successful!
            </h1>



            {{-- Message --}}
            <p class="lead mt-3">
                Thank you for ordering from Mazeoz Food.
            </p>

            <p class="text-muted">
                Your order has been received successfully.
            </p>



            {{-- Order Number --}}
            <div class="alert alert-info mt-4">

                <h5 class="mb-0">

                    Order Number:

                    <strong>
                        #{{ $id }}
                    </strong>

                </h5>

            </div>



            {{-- Status --}}
            <div class="alert alert-warning">

                <strong>
                    Order Status:
                </strong>

                Pending

            </div>



            {{-- Buttons --}}
            <div class="d-grid gap-2 mt-4">

                <a
                    href="{{ route('home') }}"
                    class="btn btn-dark btn-lg"
                >
                    🍔 Continue Shopping
                </a>


                <a
                    href="{{ route('cart') }}"
                    class="btn btn-outline-secondary"
                >
                    🛒 View Cart
                </a>

            </div>


        </div>

    </div>

</div>


</body>

</html>