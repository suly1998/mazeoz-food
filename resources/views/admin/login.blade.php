<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login - Mazeoz Food</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            min-height: 100vh;
            background: linear-gradient(
                135deg,
                #212529,
                #343a40
            );

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            border: none;
            border-radius: 20px;
        }

        .brand-icon {
            font-size: 55px;
        }

        .form-control {
            padding: 12px;
            border-radius: 10px;
        }

        .login-btn {
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
        }

    </style>

</head>


<body>


<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">


            <div class="card login-card shadow-lg">

                <div class="card-body p-4 p-md-5">


                    {{-- BRAND --}}

                    <div class="text-center mb-4">

                        <div class="brand-icon">
                            🍔
                        </div>

                        <h2 class="fw-bold">
                            Mazeoz Food
                        </h2>

                        <p class="text-muted mb-0">
                            Admin Login
                        </p>

                    </div>



                    {{-- SUCCESS MESSAGE --}}

                    @if (session('success'))

                        <div class="alert alert-success">

                            ✅ {{ session('success') }}

                        </div>

                    @endif



                    {{-- ERROR MESSAGE --}}

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            @foreach ($errors->all() as $error)

                                <div>
                                    ❌ {{ $error }}
                                </div>

                            @endforeach

                        </div>

                    @endif



                    {{-- LOGIN FORM --}}

                    <form
                        method="POST"
                        action="{{ route('admin.login.submit') }}"
                    >

                        @csrf


                        {{-- EMAIL --}}

                        <div class="mb-3">

                            <label
                                for="email"
                                class="form-label fw-bold"
                            >
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Enter admin email"
                                required
                                autofocus
                            >

                        </div>



                        {{-- PASSWORD --}}

                        <div class="mb-4">

                            <label
                                for="password"
                                class="form-label fw-bold"
                            >
                                Password
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter password"
                                required
                            >

                        </div>



                        {{-- LOGIN BUTTON --}}

                        <button
                            type="submit"
                            class="btn btn-dark w-100 login-btn"
                        >
                            🔐 Login to Admin
                        </button>

                    </form>



                    {{-- BACK TO WEBSITE --}}

                    <div class="text-center mt-4">

                        <a
                            href="{{ route('home') }}"
                            class="text-decoration-none"
                        >
                            ← Back to Website
                        </a>

                    </div>


                </div>

            </div>


        </div>

    </div>

</div>


</body>

</html>