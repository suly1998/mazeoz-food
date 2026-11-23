<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Food - Mazeoz Food</title>

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

    </style>

</head>


<body>


<div class="container-fluid">

    <div class="row">


        {{-- Sidebar --}}
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



        {{-- Main Content --}}
        <div class="col-md-10 p-4">


            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold">
                        Add New Food
                    </h2>

                    <p class="text-muted">
                        Add a new item to your menu
                    </p>

                </div>


                <a
                    href="{{ route('admin.foods.index') }}"
                    class="btn btn-dark"
                >
                    ← Back to Foods
                </a>

            </div>



            {{-- Validation Errors --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Please fix the following:
                    </strong>

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
                        action="{{ route('admin.foods.store') }}"
                        enctype="multipart/form-data"
                    >

                        @csrf


                        {{-- Food Name --}}
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Food Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Example: Chicken Biryani"
                                value="{{ old('name') }}"
                                required
                            >

                        </div>



                        {{-- Description --}}
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Description
                            </label>

                            <textarea
                                name="description"
                                class="form-control"
                                rows="4"
                                placeholder="Describe the food..."
                            >{{ old('description') }}</textarea>

                        </div>



                        {{-- Price --}}
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Price (TZS)
                            </label>

                            <input
                                type="number"
                                name="price"
                                class="form-control"
                                placeholder="Example: 10000"
                                min="0"
                                step="0.01"
                                value="{{ old('price') }}"
                                required
                            >

                        </div>



                        {{-- Image --}}
                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Food Image
                            </label>

                            <input
                                type="file"
                                name="image"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <small class="text-muted">
                                JPG, JPEG, PNG or WEBP. Maximum 2MB.
                            </small>

                        </div>



                        {{-- Availability --}}
                        <div class="form-check mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="is_available"
                                id="is_available"
                                checked
                            >

                            <label
                                class="form-check-label fw-bold"
                                for="is_available"
                            >
                                Food is available
                            </label>

                        </div>



                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="btn btn-success px-4"
                        >
                            ➕ Add Food
                        </button>


                        <a
                            href="{{ route('admin.foods.index') }}"
                            class="btn btn-outline-secondary px-4"
                        >
                            Cancel
                        </a>


                    </form>


                </div>

            </div>


        </div>

    </div>

</div>


</body>

</html>