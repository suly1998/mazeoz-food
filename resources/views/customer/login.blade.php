<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Mazeoz Food</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background: #f8f9fa;
        }

        .login-container {
            max-width: 500px;
            margin: 70px auto;
        }

        .login-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .brand {
            font-weight: 800;
            font-size: 30px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
        }

        .login-btn {
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="login-container">

        <div class="card login-card">

            <div class="card-body p-4 p-md-5">

                <div class="text-center mb-4">

                    <div class="brand">
                        🍔 Mazeoz Food
                    </div>

                    <p class="text-muted mb-0">
                        Login to your customer account
                    </p>

                </div>

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form
                    method="POST"
                    action="{{ route('customer.login.submit') }}"
                >

                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                        >

                    </div>

                    {{-- Password --}}
                    <div class="mb-4">

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                            required
                        >

                    </div>

                    <button
                        type="submit"
                        class="btn btn-dark w-100 login-btn"
                    >
                        🔐 Login
                    </button>

                </form>

                <div class="text-center mt-4">

                    <span class="text-muted">
                        Don't have an account?
                    </span>

                    <a
                        href="{{ route('customer.register') }}"
                        class="text-decoration-none fw-bold"
                    >
                        Create Account
                    </a>

                </div>

                <div class="text-center mt-3">

                    <a
                        href="{{ route('home') }}"
                        class="text-muted text-decoration-none"
                    >
                        ← Back to Mazeoz Food
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>