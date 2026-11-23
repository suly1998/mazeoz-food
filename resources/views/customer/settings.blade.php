<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ __('messages.settings') }} - Mazeoz Food</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f5f6f8; }
        .navbar { height: 65px; }
        .navbar-brand { font-weight: 800; font-size: 21px; }
        .dashboard-wrapper { min-height: calc(100vh - 65px); }

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

        .profile-mini h6 { margin-bottom: 3px; font-weight: 700; }
        .profile-mini small { color: #adb5bd; }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li { margin-bottom: 8px; }

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

        .sidebar-menu .logout-button { color: #ffb3b3; }

        .sidebar-menu .logout-button:hover {
            background: #dc3545;
            color: white;
        }

        .main-content { padding: 35px; }
        .page-title { font-weight: 800; margin-bottom: 5px; }
        .page-subtitle { color: #6c757d; margin-bottom: 30px; }

        .content-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }

        .content-card .card-body { padding: 30px; }

        .settings-icon {
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

        .form-select {
            border-radius: 10px;
            padding: 12px 14px;
        }

        .save-button {
            border-radius: 10px;
            padding: 11px 25px;
            font-weight: 600;
        }

        @media (max-width: 991px) {
            .sidebar {
                min-height: auto;
                padding: 15px;
            }

            .main-content { padding: 20px; }
            .profile-mini { padding-bottom: 15px; }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid px-4">

        <a class="navbar-brand" href="{{ route('home') }}">
            🍔 Mazeoz Food
        </a>

        <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">
            🌐 {{ __('messages.visit_website') }}
        </a>

    </div>
</nav>

<div class="container-fluid">
    <div class="row dashboard-wrapper">

        <div class="col-lg-3 col-xl-2 px-0">
            <aside class="sidebar">

                <div class="profile-mini">
                    <div class="profile-avatar">👤</div>

                    <h6>{{ auth()->user()->name }}</h6>

                    <small>
                        {{ __('messages.customer_account') }}
                    </small>
                </div>

                <ul class="sidebar-menu">

                    <li>
                        <a href="{{ route('customer.dashboard') }}">
                            📊 <span>{{ __('messages.dashboard') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('customer.profile') }}">
                            👤 <span>{{ __('messages.my_profile') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('customer.orders') }}">
                            🛒 <span>{{ __('messages.my_orders') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('customer.password') }}">
                            🔐 <span>{{ __('messages.change_password') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('customer.address') }}">
                            📍 <span>{{ __('messages.delivery_address') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('customer.settings') }}" class="active">
                            ⚙️ <span>{{ __('messages.settings') }}</span>
                        </a>
                    </li>

                    <li class="mt-4">
                        <form action="{{ route('customer.logout') }}" method="POST">
                            @csrf

                            <button
                                type="submit"
                                class="logout-button"
                                onclick="return confirm('Are you sure you want to logout?');"
                            >
                                🚪 <span>{{ __('messages.logout') }}</span>
                            </button>
                        </form>
                    </li>

                </ul>

            </aside>
        </div>

        <div class="col-lg-9 col-xl-10">

            <main class="main-content">

                <div class="mb-4">
                    <h2 class="page-title">
                        ⚙️ {{ __('messages.settings_title') }}
                    </h2>

                    <p class="page-subtitle">
                        {{ __('messages.settings_description') }}
                    </p>
                </div>

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

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">

                        <strong>Please fix the following:</strong>

                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
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

                                <div class="settings-icon">⚙️</div>

                                <h4 class="fw-bold">
                                    {{ __('messages.language') }}
                                </h4>

                                <p class="text-muted mb-4">
                                    {{ __('messages.choose_language') }}
                                </p>

                                <form
                                    action="{{ route('customer.settings.update') }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('PUT')

                                    <div class="mb-4">

                                        <label
                                            for="language"
                                            class="form-label"
                                        >
                                            🌐 {{ __('messages.language') }}
                                        </label>

                                        <select
                                            name="language"
                                            id="language"
                                            class="form-select"
                                            required
                                        >

                                            <option
                                                value="en"
                                                {{ $user->language === 'en' ? 'selected' : '' }}
                                            >
                                                🇬🇧 English
                                            </option>

                                            <option
                                                value="sw"
                                                {{ $user->language === 'sw' ? 'selected' : '' }}
                                            >
                                                🇹🇿 Kiswahili
                                            </option>

                                        </select>

                                        <div class="form-text">
                                            Choose the language you want to use on Mazeoz Food.
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-end">

                                        <button
                                            type="submit"
                                            class="btn btn-danger save-button"
                                        >
                                            💾 {{ __('messages.save_changes') }}
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
