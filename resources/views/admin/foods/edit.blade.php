<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Food - Mazeoz Food</title>

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

        .current-image {
            width: 180px;
            height: 130px;
            object-fit: cover;
            border-radius: 12px;
        }

    </style>

</head>


<body>

<div class="container-fluid">

    <div class="row">

        {{-- SIDEBAR --}}

        <div class="col-md-2 sidebar p-3">

            <h4 class="text-white fw-bold mb-4">
                🍔 Mazeoz Food
            </h4>

            <a href="{{ route('admin.dashboard') }}">
                📊 Dashboard
            </a>

            <a href="{{ route('admin.foods.index') }}">
                🍔 Foods
            </a>

            <a href="{{ route('home') }}">
                🏠 View Website
            </a>

        </div>


        {{-- MAIN CONTENT --}}

        <div class="col-md-10 p-4">

            <div class="mb-4">

                <h2 class="fw-bold">
                    ✏️ Edit Food
                </h2>

                <p class="text-muted">
                    Update food information
                </p>

            </div>


            {{-- Validation Errors --}}

            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>Please fix the following errors:</strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <form
                        method="POST"
                        action="{{ route('admin.foods.update', $food->id) }}"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        @method('PUT')


                        {{-- FOOD NAME --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Food Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $food->name) }}"
                                required
                            >

                        </div>


                        {{-- DESCRIPTION --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Description
                            </label>

                            <textarea
                                name="description"
                                class="form-control"
                                rows="4"
                            >{{ old('description', $food->description) }}</textarea>

                        </div>


                        {{-- PRICE --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Price (TZS)
                            </label>

                            <input
                                type="number"
                                name="price"
                                class="form-control"
                                value="{{ old('price', $food->price) }}"
                                min="0"
                                required
                            >

                        </div>


                        {{-- CURRENT IMAGE --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Current Image
                            </label>

                            <div>

                                @if ($food->image)

                                    <img
                                        src="{{ asset('images/' . $food->image) }}"
                                        alt="{{ $food->name }}"
                                        class="current-image"
                                    >

                                @else

                                    <div class="text-muted">
                                        No image available
                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- NEW IMAGE --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Change Image
                            </label>

                            <input
                                type="file"
                                name="image"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <small class="text-muted">
                                Leave empty if you want to keep the current image.
                                Maximum size: 2MB.
                            </small>

                        </div>


                        {{-- AVAILABILITY --}}

                        <div class="form-check mb-4">

                            <input
                                type="checkbox"
                                name="is_available"
                                value="1"
                                class="form-check-input"
                                id="is_available"
                                {{ $food->is_available ? 'checked' : '' }}
                            >

                            <label
                                class="form-check-label"
                                for="is_available"
                            >
                                Food is available
                            </label>

                        </div>


                        {{-- BUTTONS --}}

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-success"
                            >
                                💾 Update Food
                            </button>


                            <a
                                href="{{ route('admin.foods.index') }}"
                                class="btn btn-secondary"
                            >
                                ← Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>

</html>