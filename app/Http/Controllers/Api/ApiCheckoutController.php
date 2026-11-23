<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ApiCheckoutController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'location' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'payment_method' => [
                'required',
                'in:cash,mpesa,airtel_money,tigo_pesa',
            ],
            'items' => ['required', 'array', 'min:1'],
            'items.*.food_id' => ['required', 'integer', 'distinct', 'exists:foods,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:100'],
        ]);

        $order = DB::transaction(function () use ($request, $validated) {
            $total = 0;
            $orderItems = [];

            foreach ($validated['items'] as $item) {
                $food = Food::where('id', $item['food_id'])
                    ->lockForUpdate()
                    ->first();

                if (!$food || !$food->is_available) {
                    throw ValidationException::withMessages([
                        'items' => [
                            'One or more selected foods are unavailable.',
                        ],
                    ]);
                }

                $price = (float) $food->price;
                $quantity = (int) $item['quantity'];
                $subtotal = $price * $quantity;

                $total += $subtotal;

                $orderItems[] = [
                    'food_id' => $food->id,
                    'food_name' => $food->name,
                    'price' => $price,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal,
                ];
            }

            $order = Order::create([
                'user_id' => $request->user()->id,
                'customer_name' => $validated['customer_name'],
                'phone' => $validated['phone'],
                'location' => $validated['location'],
                'notes' => $validated['notes'] ?? null,
                'total' => $total,
                'status' => 'pending',
                'payment_method' => $validated['payment_method'],
                'payment_status' => 'pending',
                'transaction_reference' => null,
            ]);

            foreach ($orderItems as $item) {
                $order->items()->create($item);
            }

            return $order->load('items');
        });

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully.',
            'data' => $order,
        ], 201);
    }
}
