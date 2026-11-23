<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Food Management - Mazeoz Food</title>

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

        .food-image {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .status-button {
            min-width: 145px;
        }

    </style>

</head>


<body>


<div class="container-fluid">

    <div class="row">


        {{-- ========================= --}}
        {{-- SIDEBAR --}}
        {{-- ========================= --}}

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



        {{-- ========================= --}}
        {{-- MAIN CONTENT --}}
        {{-- ========================= --}}

        <div class="col-md-10 p-4">


            {{-- Header --}}

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold mb-1">
                        Food Management
                    </h2>

                    <p class="text-muted mb-0">
                        Manage Mazeoz Food menu
                    </p>

                </div>


                {{-- Add New Food --}}

                <a
                    href="{{ route('admin.foods.create') }}"
                    class="btn btn-success"
                >
                    ➕ Add New Food
                </a>

            </div>



            {{-- ========================= --}}
            {{-- SUCCESS MESSAGE --}}
            {{-- ========================= --}}

            @if (session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    ✅ {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            @endif



            {{-- ========================= --}}
            {{-- ERROR MESSAGE --}}
            {{-- ========================= --}}

            @if (session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    ❌ {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            @endif



            {{-- ========================= --}}
            {{-- FOOD TABLE --}}
            {{-- ========================= --}}

            <div class="card shadow-sm">

                <div class="card-body p-4">


                    {{-- Table Header --}}

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h5 class="fw-bold mb-0">
                            🍔 All Foods
                        </h5>


                        <span class="badge bg-dark">
                            {{ $foods->count() }} Foods
                        </span>

                    </div>



                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-dark">

                                <tr>

                                    <th>
                                        Image
                                    </th>

                                    <th>
                                        Food Name
                                    </th>

                                    <th>
                                        Description
                                    </th>

                                    <th>
                                        Price
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Action
                                    </th>

                                </tr>

                            </thead>



                            <tbody>

                                @forelse ($foods as $food)

                                    <tr>


                                        {{-- ========================= --}}
                                        {{-- IMAGE --}}
                                        {{-- ========================= --}}

                                        <td>

                                            @if ($food->image)

                                                <img
                                                    src="{{ asset('images/' . $food->image) }}"
                                                    alt="{{ $food->name }}"
                                                    class="food-image"
                                                >

                                            @else

                                                <div
                                                    class="bg-secondary text-white rounded d-flex align-items-center justify-content-center"
                                                    style="width:80px;height:60px;"
                                                >
                                                    🍔
                                                </div>

                                            @endif

                                        </td>



                                        {{-- ========================= --}}
                                        {{-- NAME --}}
                                        {{-- ========================= --}}

                                        <td>

                                            <strong>
                                                {{ $food->name }}
                                            </strong>

                                        </td>



                                        {{-- ========================= --}}
                                        {{-- DESCRIPTION --}}
                                        {{-- ========================= --}}

                                        <td>

                                            <span class="text-muted">

                                                {{ Str::limit(
                                                    $food->description ?? 'No description',
                                                    50
                                                ) }}

                                            </span>

                                        </td>



                                        {{-- ========================= --}}
                                        {{-- PRICE --}}
                                        {{-- ========================= --}}

                                        <td>

                                            <strong class="text-success">

                                                TZS {{ number_format($food->price) }}

                                            </strong>

                                        </td>



                                        {{-- ========================= --}}
                                        {{-- STATUS --}}
                                        {{-- ========================= --}}

                                        <td>

                                            @if ($food->is_available)

                                                <span class="badge bg-success mb-2">
                                                    🟢 Available
                                                </span>

                                            @else

                                                <span class="badge bg-danger mb-2">
                                                    🔴 Unavailable
                                                </span>

                                            @endif

                                        </td>



                                        {{-- ========================= --}}
                                        {{-- ACTIONS --}}
                                        {{-- ========================= --}}

                                        <td>


                                            {{-- AVAILABILITY TOGGLE --}}

                                            <form
                                                action="{{ route('admin.foods.toggle', $food->id) }}"
                                                method="POST"
                                                class="d-inline"
                                            >

                                                @csrf

                                                @method('PATCH')

                                                @if ($food->is_available)

                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm btn-warning status-button"
                                                        onclick="return confirm('Make this food unavailable?');"
                                                    >
                                                        🔴 Make Unavailable
                                                    </button>

                                                @else

                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm btn-success status-button"
                                                        onclick="return confirm('Make this food available?');"
                                                    >
                                                        🟢 Make Available
                                                    </button>

                                                @endif

                                            </form>


                                            <br class="d-md-none">


                                            {{-- EDIT --}}

                                            <a
                                                href="{{ route('admin.foods.edit', $food->id) }}"
                                                class="btn btn-sm btn-primary mt-1"
                                            >
                                                ✏️ Edit
                                            </a>


                                            {{-- DELETE --}}

                                            <form
                                                action="{{ route('admin.foods.destroy', $food->id) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this food?');"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger mt-1"
                                                >
                                                    🗑️ Delete
                                                </button>

                                            </form>

                                        </td>


                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="6"
                                            class="text-center py-5 text-muted"
                                        >

                                            <div class="fs-1">
                                                🍔
                                            </div>

                                            <h5 class="mt-3">
                                                No foods found
                                            </h5>

                                            <p>
                                                Add your first food item.
                                            </p>

                                            <a
                                                href="{{ route('admin.foods.create') }}"
                                                class="btn btn-success"
                                            >
                                                ➕ Add New Food
                                            </a>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


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