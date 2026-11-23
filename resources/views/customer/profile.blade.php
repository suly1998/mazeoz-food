<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>My Dashboard - Mazeoz Food</title>

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

        .form-control {
            border-radius: 10px;
            padding: 11px 13px;
        }

        .form-label {
            font-weight: 600;
        }

        .update-button {
            border-radius: 10px;
            padding: 11px 25px;
            font-weight: 600;
        }

        .mobile-menu-button {
            display: none;
        }

        @media (max-width: 991px) {

            .sidebar {
                min-height: auto;
                padding: 15px;
            }

            .mobile-menu-button {
                display: block;
                margin-bottom: 15px;
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
                🏠 {{ __('messages.visit_website') }}
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

                        <a
                            href="{{ route('customer.profile') }}"
                            class="active"
                        >
                            🏠
                            <span>{{ __('messages.dashboard') }}</span>
                        </a>

                    </li>


                    {{-- {{ __('messages.my_profile_title') }} --}}

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


                {{-- Mobile Menu Info --}}

                <div class="mobile-menu-button">

                    <button
                        class="btn btn-dark"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#mobileSidebar"
                    >
                        ☰ Menu
                    </button>

                </div>



                {{-- Page Header --}}

                <div>

                    <h2 class="page-title">
                        {{ __('messages.my_profile_title') }}
                    </h2>

                    <p class="page-subtitle">
                        {{ __('messages.profile_description') }}
                    </p>

                </div>



                {{-- Success Message --}}

                @if (session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                        ></button>

                    </div>

                @endif



                {{-- Validation Errors --}}

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif



                {{-- Profile Card --}}

                <div class="card content-card">

                    <div class="card-body">

                        <div class="row">


                            {{-- {{ __('messages.personal_information') }} --}}

                            <div class="col-12 mb-4">

                                <h5 class="fw-bold mb-1">
                                    {{ __('messages.personal_information') }}
                                </h5>

                                <p class="text-muted">
                                    {{ __('messages.update_personal_details') }}
                                </p>

                            </div>



                            {{-- Profile Form --}}

                            <form
                                action="{{ route('customer.profile.update') }}"
                                method="POST"
                            >

                                @csrf

                                @method('PUT')


                                <div class="row">


                                    {{-- Name --}}

                                    <div class="col-md-6 mb-4">

                                        <label class="form-label">
                                            {{ __('messages.full_name') }}
                                        </label>

                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                            value="{{ old('name', $user->name) }}"
                                            required
                                        >

                                    </div>



                                    {{-- Email --}}

                                    <div class="col-md-6 mb-4">

                                        <label class="form-label">
                                            {{ __('messages.email_address') }}
                                        </label>

                                        <input
                                            type="email"
                                            name="email"
                                            class="form-control"
                                            value="{{ old('email', $user->email) }}"
                                            required
                                        >

                                    </div>



                                    {{-- Phone --}}

                                    <div class="col-md-6 mb-4">

                                        <label class="form-label">
                                            {{ __('messages.phone_number') }}
                                        </label>

                                        <input
                                            type="text"
                                            name="phone"
                                            class="form-control"
                                            value="{{ old('phone', $user->phone) }}"
                                            placeholder="Example: 0777 123 456"
                                        >

                                    </div>



                                    {{-- Location --}}

                                    <div class="col-md-6 mb-4">

                                        <label class="form-label">
                                            {{ __('messages.location_address') }}
                                        </label>

                                        <input
                                            type="text"
                                            name="location"
                                            class="form-control"
                                            value="{{ old('location', $user->location) }}"
                                            placeholder="Example: Stone Town, Zanzibar"
                                        >

                                    </div>


                                </div>



                                {{-- Update Button --}}

                                <div class="d-flex justify-content-end">

                                    <button
                                        type="submit"
                                        class="btn btn-dark update-button"
                                    >
                                        💾 {{ __('messages.update_profile') }}
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>


            </main>

        </div>

    </div>

</div>



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>