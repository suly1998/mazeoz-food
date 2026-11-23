<?php
namespace App\Http\Controllers;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminFoodController extends Controller
{
    /**
     * Display all foods.
     */
    public function index()
    {
        $foods = Food::latest()->get();

        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show create food form.
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a new food.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' .
                preg_replace('/[^A-Za-z0-9._-]/', '_',
                    $request->file('image')->getClientOriginalName()
                );

            $request->file('image')->move(
                public_path('images'),
                $imageName
            );
        }

        Food::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'image' => $imageName,
            'is_available' => $request->boolean('is_available', true),
        ]);

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food added successfully.');
    }

    /**
     * Show edit food form.
     */
    public function edit($id)
    {
        $food = Food::findOrFail($id);

        return view('admin.foods.edit', compact('food'));
    }

    /**
     * Update food.
     */
    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '_' .
                preg_replace('/[^A-Za-z0-9._-]/', '_',
                    $request->file('image')->getClientOriginalName()
                );

            $request->file('image')->move(
                public_path('images'),
                $imageName
            );

            $oldImage = $food->image;

            $data['image'] = $imageName;

            if ($oldImage && File::exists(public_path('images/' . $oldImage))) {
                File::delete(public_path('images/' . $oldImage));
            }
        }

        if ($request->has('is_available')) {
            $data['is_available'] = $request->boolean('is_available');
        }

        $food->update($data);

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food updated successfully.');
    }

    /**
     * Toggle food availability.
     */
    public function toggleAvailability($id)
    {
        $food = Food::findOrFail($id);

        $food->is_available = ! $food->is_available;
        $food->save();

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food availability updated successfully.');
    }

    /**
     * Delete food.
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);

        // Remove the image file if it exists.
        if (
            $food->image &&
            File::exists(public_path('images/' . $food->image))
        ) {
            File::delete(public_path('images/' . $food->image));
        }

        $food->delete();

        return redirect()
            ->route('admin.foods.index')
            ->with('success', 'Food deleted successfully.');
    }
}
