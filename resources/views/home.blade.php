<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mazeoz Food | Fresh Food, Great Taste</title>

    <meta name="description" content="Discover delicious meals at Mazeoz Food. Explore our menu and order your favourite food online.">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --mf-green: #198754;
            --mf-dark-green: #125c3b;
            --mf-light-green: #e9f5ec;
            --mf-cream: #fbf7ed;
            --mf-white: #ffffff;
            --mf-text: #24352b;
            --mf-muted: #718078;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            margin: 0;
            background: var(--mf-cream);
            color: var(--mf-text);
            font-family: Arial, Helvetica, sans-serif;
        }

        /* NAVBAR */

        .main-navbar {
            background: rgba(255, 255, 255, 0.97);
            border-bottom: 1px solid #e9eee9;
            box-shadow: 0 4px 20px rgba(28, 65, 43, 0.05);
        }

        .navbar-brand {
            color: var(--mf-dark-green) !important;
            font-size: 1.4rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .brand-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            margin-right: 7px;
            border-radius: 13px;
            background: var(--mf-light-green);
            color: var(--mf-green);
        }

        .main-navbar .nav-link {
            color: #46574c;
            font-weight: 600;
            padding: 10px 13px !important;
            transition: color 0.2s ease;
        }

        .main-navbar .nav-link:hover,
        .main-navbar .nav-link:focus {
            color: var(--mf-green);
        }

        .btn-brand {
            background: var(--mf-green);
            color: white;
            border: 1px solid var(--mf-green);
            border-radius: 10px;
            font-weight: 700;
            padding: 11px 20px;
            transition: 0.2s ease;
        }

        .btn-brand:hover {
            background: var(--mf-dark-green);
            border-color: var(--mf-dark-green);
            color: white;
            transform: translateY(-1px);
        }

        .btn-outline-brand {
            background: white;
            color: var(--mf-dark-green);
            border: 1px solid #cbdccf;
            border-radius: 10px;
            font-weight: 700;
            padding: 10px 18px;
        }

        .btn-outline-brand:hover {
            background: var(--mf-light-green);
            color: var(--mf-dark-green);
            border-color: var(--mf-green);
        }

        /* HERO */

        .hero-section {
            position: relative;
            overflow: hidden;
            margin-top: 34px;
            margin-bottom: 55px;
            padding: 55px 48px;
            border-radius: 26px;
            background:
                radial-gradient(circle at 8% 10%, rgba(255,255,255,0.10), transparent 28%),
                linear-gradient(120deg, #104b32 0%, #198754 65%, #3b9b63 100%);
            color: white;
            box-shadow: 0 20px 45px rgba(18, 92, 59, 0.15);
        }

        .hero-section::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            right: -100px;
            top: -120px;
            border: 45px solid rgba(255,255,255,0.07);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-label {
            display: inline-block;
            padding: 8px 14px;
            margin-bottom: 20px;
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 50px;
            background: rgba(255,255,255,0.12);
            color: #f4f8ed;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .hero-section h1 {
            max-width: 650px;
            margin-bottom: 20px;
            font-size: clamp(2.2rem, 4vw, 3.8rem);
            font-weight: 800;
            line-height: 1.12;
            letter-spacing: -1.5px;
        }

        .hero-section .hero-description {
            max-width: 580px;
            margin-bottom: 28px;
            color: rgba(255,255,255,0.85);
            font-size: 1.08rem;
            line-height: 1.8;
        }

        .hero-image-wrap {
            position: relative;
            z-index: 2;
            padding: 10px;
        }

        .hero-image {
            display: block;
            width: 100%;
            height: 330px;
            object-fit: cover;
            border: 6px solid rgba(255,255,255,0.2);
            border-radius: 24px;
            box-shadow: 0 18px 40px rgba(0,0,0,0.2);
        }

        .hero-note {
            position: absolute;
            right: 0;
            bottom: 0;
            padding: 14px 18px;
            border-radius: 14px;
            background: white;
            color: var(--mf-dark-green);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            font-weight: 700;
        }

        /* BENEFITS */

        .benefit-card {
            height: 100%;
            padding: 20px;
            border: 1px solid #edf0e8;
            border-radius: 16px;
            background: white;
        }

        .benefit-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            margin-bottom: 12px;
            border-radius: 14px;
            background: var(--mf-light-green);
            color: var(--mf-green);
            font-size: 1.3rem;
        }

        .benefit-card h6 {
            margin-bottom: 6px;
            font-weight: 800;
        }

        .benefit-card p {
            margin-bottom: 0;
            color: var(--mf-muted);
            font-size: 0.9rem;
        }

        /* MENU */

        .menu-section {
            padding: 25px 0 65px;
        }

        .section-kicker {
            margin-bottom: 8px;
            color: var(--mf-green);
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .section-heading {
            margin-bottom: 12px;
            color: var(--mf-dark-green);
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            font-weight: 800;
            letter-spacing: -0.7px;
        }

        .section-description {
            color: var(--mf-muted);
        }

        .food-card {
            height: 100%;
            overflow: hidden;
            border: 1px solid #edf0e8;
            border-radius: 20px;
            background: white;
            box-shadow: 0 5px 18px rgba(29, 66, 43, 0.04);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .food-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(29, 66, 43, 0.12);
        }

        .food-image {
            display: block;
            width: 100%;
            height: 230px;
            object-fit: cover;
            background: #e9eee9;
        }

        .unavailable-card {
            opacity: 0.78;
        }

        .unavailable-image {
            filter: grayscale(65%);
        }

        .food-card .card-body {
            padding: 22px;
        }

        .food-card .card-title {
            margin-bottom: 10px;
            color: var(--mf-text);
            font-size: 1.15rem;
            font-weight: 800;
        }

        .food-description {
            min-height: 45px;
            color: var(--mf-muted);
            font-size: 0.94rem;
            line-height: 1.6;
        }

        .food-price {
            margin-top: 6px;
            margin-bottom: 16px;
            color: var(--mf-green);
            font-size: 1.3rem;
            font-weight: 800;
        }

        .availability-badge {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
        }

        .available-badge {
            background: #e7f5eb;
            color: #176b3c;
        }

        .unavailable-badge {
            background: #fce9e7;
            color: #a52c24;
        }

        .empty-food {
            padding: 20px 0 35px;
        }

        .empty-food .card {
            padding: 35px 15px;
            border: 1px dashed #cbdccf;
            border-radius: 20px;
            background: white;
        }

        .empty-food-icon {
            margin-bottom: 12px;
            color: var(--mf-green);
            font-size: 3rem;
        }

        /* FOOTER */

        .main-footer {
            padding-top: 55px;
            background: #103d2b;
            color: white;
        }

        .footer-brand {
            display: inline-block;
            margin-bottom: 16px;
            color: white;
            font-size: 1.5rem;
            font-weight: 800;
            text-decoration: none;
        }

        .footer-description {
            max-width: 340px;
            color: rgba(255,255,255,0.7);
            line-height: 1.8;
        }

        .footer-heading {
            margin-bottom: 18px;
            color: white;
            font-size: 1rem;
            font-weight: 800;
        }

        .footer-links {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255,255,255,0.72);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-links a:hover {
            color: #b9e8c5;
        }

        .footer-contact {
            color: rgba(255,255,255,0.72);
            line-height: 1.8;
        }

        .footer-contact i {
            margin-right: 8px;
            color: #a7dfb6;
        }

        .footer-divider {
            margin-top: 35px;
            border-color: rgba(255,255,255,0.16);
        }

        .footer-bottom {
            padding: 18px 0;
            color: rgba(255,255,255,0.65);
            font-size: 0.88rem;
        }

        .footer-social {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            margin-right: 6px;
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .footer-social:hover {
            background: white;
            color: var(--mf-dark-green);
        }

        /* RESPONSIVE */

        @media (max-width: 767.98px) {
            .hero-section {
                margin-top: 22px;
                margin-bottom: 35px;
                padding: 35px 22px;
                border-radius: 20px;
            }

            .hero-section h1 {
                letter-spacing: -0.8px;
            }

            .hero-image {
                height: 240px;
            }

            .hero-note {
                right: 5px;
                bottom: -3px;
            }

            .food-image {
                height: 220px;
            }

            .menu-section {
                padding-bottom: 45px;
            }
        }
    </style>
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg main-navbar sticky-top">
    <div class="container py-2">

        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <span class="brand-icon">
                <i class="bi bi-egg-fried"></i>
            </span>
            Mazeoz Food
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarContent"
            aria-controls="navbarContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">

            <ul class="navbar-nav me-auto ms-lg-4 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="bi bi-house-door me-1"></i>
                        {{ __('messages.home') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#foods">
                        <i class="bi bi-journal-richtext me-1"></i>
                        {{ __('messages.our_menu') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart') }}">
                        <i class="bi bi-cart3 me-1"></i>
                        {{ __('messages.cart') }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav align-items-lg-center">

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.profile') }}">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ __('messages.my_profile') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <span class="nav-link">
                            {{ __('messages.hi') }},
                            {{ auth()->user()->name }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <form
                            action="{{ route('customer.logout') }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-outline-brand btn-sm ms-lg-2"
                                onclick="return confirm('{{ app()->getLocale() === 'sw' ? 'Una uhakika unataka kutoka?' : 'Are you sure you want to logout?' }}');"
                            >
                                <i class="bi bi-box-arrow-right me-1"></i>
                                {{ __('messages.logout') }}
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>
                            {{ __('messages.login') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="btn btn-brand btn-sm ms-lg-2"
                            href="{{ route('customer.register') }}"
                        >
                            <i class="bi bi-person-plus me-1"></i>
                            {{ __('messages.register') }}
                        </a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>


{{-- MAIN CONTENT --}}
<main class="container">

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
    @endif


    {{-- HERO SECTION --}}
    <section class="hero-section">
        <div class="row align-items-center g-4">

            <div class="col-lg-6 hero-content">
                <span class="hero-label">
                    <i class="bi bi-stars me-1"></i>
                    Fresh meals, happy moments
                </span>

                <h1>
                    {{ __('messages.welcome_to_mazeoz') }}
                </h1>

                <p class="hero-description">
                    {{ __('messages.hero_description') }}
                </p>

                <a href="#foods" class="btn btn-light btn-lg fw-bold px-4 py-3">
                    {{ __('messages.explore_foods') }}
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="col-lg-6">
                <div class="hero-image-wrap">
                    <img
                        src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=1000&q=85"
                        alt="Fresh and delicious meal"
                        class="hero-image"
                        fetchpriority="high"
                    >

                    <div class="hero-note">
                        <i class="bi bi-heart-fill text-success me-1"></i>
                        Made for food lovers
                    </div>
                </div>
            </div>

        </div>
    </section>


    {{-- BENEFITS --}}
    <section class="row g-3 mb-5">

        <div class="col-md-4">
            <div class="benefit-card">
                <span class="benefit-icon">
                    <i class="bi bi-egg-fried"></i>
                </span>

                <h6>Delicious Meals</h6>
                <p>Discover meals made to make your day better.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="benefit-card">
                <span class="benefit-icon">
                    <i class="bi bi-basket2"></i>
                </span>

                <h6>Easy Ordering</h6>
                <p>Explore the menu and add your favourites to your cart.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="benefit-card">
                <span class="benefit-icon">
                    <i class="bi bi-hand-thumbs-up"></i>
                </span>

                <h6>Food You Choose</h6>
                <p>Check food availability before placing your order.</p>
            </div>
        </div>

    </section>


    {{-- FOOD SECTION --}}
    <section id="foods" class="menu-section">

        <div class="text-center mb-5">
            <div class="section-kicker">Good food, good mood</div>

            <h2 class="section-heading">
                {{ __('messages.our_menu') }}
            </h2>

            <p class="section-description mb-0">
                {{ __('messages.choose_food') }}
            </p>
        </div>


        @if ($foods->count() > 0)

            <div class="row g-4">

                @foreach ($foods as $food)

                    <div class="col-md-6 col-lg-4">

                        <div class="card food-card
                            {{ !$food->is_available ? 'unavailable-card' : '' }}">

                            {{-- FOOD IMAGE --}}
                            @if ($food->image)

                                <img
                                    src="{{ asset('images/' . $food->image) }}"
                                    alt="{{ $food->name }}"
                                    class="food-image
                                    {{ !$food->is_available ? 'unavailable-image' : '' }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="food-image d-flex flex-column
                                    align-items-center justify-content-center text-muted">
                                    <i class="bi bi-image fs-1 mb-2"></i>
                                    {{ __('messages.no_image') }}
                                </div>

                            @endif


                            {{-- FOOD DETAILS --}}
                            <div class="card-body d-flex flex-column">

                                <h5 class="card-title">
                                    {{ $food->name }}
                                </h5>

                                @if ($food->description)
                                    <p class="food-description">
                                        {{ $food->description }}
                                    </p>
                                @else
                                    <p class="food-description">
                                        {{ __('messages.default_food_description') }}
                                    </p>
                                @endif


                                {{-- PRICE --}}
                                <div class="food-price">
                                    TZS {{ number_format($food->price) }}
                                </div>


                                {{-- AVAILABILITY AND CART --}}
                                @if ($food->is_available)

                                    <div class="mb-3">
                                        <span class="availability-badge available-badge">
                                            <i class="bi bi-check-circle-fill me-1"></i>
                                            {{ __('messages.available') }}
                                        </span>
                                    </div>

                                    <a
                                        href="{{ route('cart.add', $food->id) }}"
                                        class="btn btn-brand w-100 mt-auto"
                                    >
                                        <i class="bi bi-cart-plus me-2"></i>
                                        {{ __('messages.add_to_cart') }}
                                    </a>

                                @else

                                    <div class="mb-3">
                                        <span class="availability-badge unavailable-badge">
                                            <i class="bi bi-x-circle-fill me-1"></i>
                                            {{ __('messages.unavailable') }}
                                        </span>
                                    </div>

                                    <button
                                        type="button"
                                        class="btn btn-secondary w-100 mt-auto"
                                        disabled
                                    >
                                        {{ __('messages.unavailable') }}
                                    </button>

                                @endif

                            </div>
                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- NO FOOD AVAILABLE --}}
            <div class="empty-food text-center">

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <div class="empty-food-icon">
                            <i class="bi bi-egg-fried"></i>
                        </div>

                        <h3 class="fw-bold">
                            {{ __('messages.no_food_available') }}
                        </h3>

                        <p class="text-muted mb-0">
                            {{ __('messages.no_food_message') }}
                        </p>

                    </div>
                </div>

            </div>

        @endif

    </section>

</main>


{{-- FOOTER --}}
<footer class="main-footer">

    <div class="container">

        <div class="row g-4">

            {{-- BRAND --}}
            <div class="col-lg-5 col-md-6">

                <a href="{{ route('home') }}" class="footer-brand">
                    <i class="bi bi-egg-fried me-2"></i>
                    Mazeoz Food
                </a>

                <p class="footer-description">
                    {{ __('messages.footer_description') }}
                </p>

                <div class="mt-3">
                    {{-- Add your real social media URLs when available --}}
                    <span class="footer-social" aria-label="Social media">
                        <i class="bi bi-heart"></i>
                    </span>

                    <span class="footer-social" aria-label="Food lovers">
                        <i class="bi bi-emoji-smile"></i>
                    </span>
                </div>

            </div>


            {{-- QUICK LINKS --}}
            <div class="col-lg-3 col-md-6">

                <h6 class="footer-heading">Quick Links</h6>

                <ul class="footer-links">

                    <li>
                        <a href="{{ route('home') }}">
                            <i class="bi bi-chevron-right me-1"></i>
                            {{ __('messages.home') }}
                        </a>
                    </li>

                    <li>
                        <a href="#foods">
                            <i class="bi bi-chevron-right me-1"></i>
                            {{ __('messages.our_menu') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('cart') }}">
                            <i class="bi bi-chevron-right me-1"></i>
                            {{ __('messages.cart') }}
                        </a>
                    </li>

                    @auth
                        <li>
                            <a href="{{ route('customer.profile') }}">
                                <i class="bi bi-chevron-right me-1"></i>
                                {{ __('messages.my_profile') }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('customer.login') }}">
                                <i class="bi bi-chevron-right me-1"></i>
                                {{ __('messages.login') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('customer.register') }}">
                                <i class="bi bi-chevron-right me-1"></i>
                                {{ __('messages.register') }}
                            </a>
                        </li>
                    @endauth

                </ul>

            </div>


            {{-- CONTACT / SERVICE --}}
            <div class="col-lg-4 col-md-6">

                <h6 class="footer-heading">Our Service</h6>

                <div class="footer-contact">

                    <p>
                        <i class="bi bi-basket2"></i>
                        Browse our menu and choose your favourite meals.
                    </p>

                    <p>
                        <i class="bi bi-cart-check"></i>
                        Add items to your cart and review your order.
                    </p>

                    <p>
                        <i class="bi bi-clock"></i>
                        Food availability is displayed on each menu item.
                    </p>

                </div>

            </div>

        </div>


        <hr class="footer-divider">


        <div class="footer-bottom">
            <div class="row align-items-center g-2">

                <div class="col-md-7 text-center text-md-start">
                    &copy; {{ date('Y') }} Mazeoz Food.
                    {{ __('messages.all_rights_reserved') }}
                </div>

                <div class="col-md-5 text-center text-md-end">
                    Made with
                    <i class="bi bi-heart-fill text-warning mx-1"></i>
                    SULYRIO.
                </div>

            </div>
        </div>

    </div>

</footer>


{{-- BOOTSTRAP JS --}}
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>
</html>