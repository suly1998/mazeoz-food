<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        Food::create([
            'name' => 'Fried Chicken',
            'description' => 'Crispy fried chicken',
            'price' => 8000,
            'image' => 'chicken.jpg',
            'is_available' => true,
        ]);

        Food::create([
            'name' => 'Chips Mayai',
            'description' => 'Chips with eggs',
            'price' => 5000,
            'image' => 'chips.jpg',
            'is_available' => true,
        ]);

        Food::create([
            'name' => 'Burger',
            'description' => 'Beef burger with vegetables',
            'price' => 7000,
            'image' => 'burger.jpg',
            'is_available' => true,
        ]);

        Food::create([
            'name' => 'Chicken Pizza',
            'description' => 'Delicious chicken pizza',
            'price' => 15000,
            'image' => 'pizza.jpg',
            'is_available' => true,
        ]);

        Food::create([
            'name' => 'Soda',
            'description' => 'Cold soft drink',
            'price' => 1500,
            'image' => 'soda.jpg',
            'is_available' => true,
        ]);
    }
}