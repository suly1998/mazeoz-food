<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ __('messages.change_password') }} - Mazeoz Food
    </title>

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

        .content-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }

        .content-card .card-body {
            padding: 30px;
        }

        .password-icon {
            width: 75px;
            height: 75px;
            background: #e7f1ff;
            color: #0d6efd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 14px;
        }

        .form-label {
            font-weight: 600;
        }

        .update-button {
            border-radius: 10px;
            padding: 11px 25px;
            font-weight: 600;
        }

        .password-note {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 18px;
            margin-top: 20px;
        }

        @media (max-width: 991px) {

            .sidebar {
                min-height: auto;
                padding: 15px;
            }

            .main-content {
                padding: 20px;
            }

            .profile-mini {
                padding-bottom: 15px;
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

        <div class="d-flex align-items-center gap-3">

            <a
                href="{{ route('home') }}"
                class="btn btn-outline-light btn-sm"
            >
                🌐 {{ __('messages.visit_website') }}
            </a>

        </div>

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

                {{-- Customer Mini Profile --}}

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

                        <a href="{{ route('customer.dashboard') }}">

                            📊

                            <span>
                                {{ __('messages.dashboard') }}
                            </span>

                        </a>

                    </li>


                    {{-- My Profile --}}

                    <li>

                        <a href="{{ route('customer.profile') }}">

                            👤

                            <span>
                                {{ __('messages.my_profile') }}
                            </span>

                        </a>

                    </li>


                    {{-- My Orders --}}

                    <li>

                        <a href="{{ route('customer.orders') }}">

                            🛒

                            <span>
                                {{ __('messages.my_orders') }}
                            </span>

                        </a>

                    </li>


                    {{-- Change Password --}}

                    <li>

                        <a
                            href="{{ route('customer.password') }}"
                            class="active"
                        >

                            🔐

                            <span>
                                {{ __('messages.change_password') }}
                            </span>

                        </a>

                    </li>


                    {{-- Delivery Address --}}

                    <li>

                        <a href="{{ route('customer.address') }}">

                            📍

                            <span>
                                {{ __('messages.delivery_address') }}
                            </span>

                        </a>

                    </li>


                    {{-- Settings --}}

                    <li>

                        <a href="{{ route('customer.settings') }}">

                            ⚙️

                            <span>
                                {{ __('messages.settings') }}
                            </span>

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

                                <span>
                                    {{ __('messages.logout') }}
                                </span>

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

                        🔐 {{ __('messages.change_password') }}

                    </h2>

                    <p class="page-subtitle">

                        {{ __('messages.update_password') }}

                    </p>

                </div>


                {{-- Success Message --}}

                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        ✅ {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                        ></button>

                    </div>

                @endif


                {{-- Validation Errors --}}

                @if($errors->any())

                    <div class="alert alert-danger alert-dismissible fade show">

                        <strong>
                            Please fix the following:
                        </strong>

                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                        ></button>

                    </div>

                @endif


                <div class="row justify-content-center">

                    <div class="col-xl-8 col-lg-10">

                        <div class="card content-card">

                            <div class="card-body">


                                <div class="password-icon">
                                    🔐
                                </div>


                                <h4 class="fw-bold">
                                    {{ __('messages.change_password') }}
                                </h4>

                                <p class="text-muted mb-4">

                                    {{ __('messages.update_password') }}

                                </p>


                                <form
                                    action="{{ route('customer.password.update') }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('PUT')


                                    {{-- Current Password --}}

                                    <div class="mb-4">

                                        <label
                                            for="current_password"
                                            class="form-label"
                                        >

                                            {{ __('messages.current_password') }}

                                        </label>

                                        <input
                                            type="password"
                                            name="current_password"
                                            id="current_password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            placeholder="Enter your current password"
                                            required
                                        >

                                        @error('current_password')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- New Password --}}

                                    <div class="mb-4">

                                        <label
                                            for="password"
                                            class="form-label"
                                        >

                                            {{ __('messages.new_password') }}

                                        </label>

                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Enter your new password"
                                            required
                                        >

                                        @error('password')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- Confirm Password --}}

                                    <div class="mb-4">

                                        <label
                                            for="password_confirmation"
                                            class="form-label"
                                        >

                                            {{ __('messages.confirm_password') }}

                                        </label>

                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            id="password_confirmation"
                                            class="form-control"
                                            placeholder="Confirm your new password"
                                            required
                                        >

                                    </div>


                                    {{-- Password Note --}}

                                    <div class="password-note">

                                        <strong>
                                            🔒 Password Security
                                        </strong>

                                        <p class="text-muted mb-0 mt-2">

                                            Use a strong password with at least
                                            8 characters.

                                        </p>

                                    </div>


                                    {{-- Submit --}}

                                    <div class="d-flex justify-content-end mt-4">

                                        <button
                                            type="submit"
                                            class="btn btn-danger update-button"
                                        >

                                            🔐 {{ __('messages.update_password') }}

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </main>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>