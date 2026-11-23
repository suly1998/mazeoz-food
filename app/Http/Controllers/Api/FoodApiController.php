<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\JsonResponse;

class FoodApiController extends Controller
{
    public function index(): JsonResponse
    {
        $foods = Food::where('is_available', true)
            ->select([
                'id',
                'name',
                'description',
                'price',
                'image',
                'is_available',
            ])
            ->orderBy('name')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Foods retrieved successfully.',
            'data' => $foods,
        ]);
    }
}
