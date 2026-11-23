<?php

namespace App\Http\Controllers;

use App\Models\Food;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::latest()->get();

        return view('home', compact('foods'));
    }
}