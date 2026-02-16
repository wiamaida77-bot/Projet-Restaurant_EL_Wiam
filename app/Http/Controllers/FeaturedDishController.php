<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedDish;

class FeaturedDishController extends Controller
{
    /**
     * Display a listing of featured dishes.
     */
    public function index()
    {
        $featuredDishes = FeaturedDish::orderBy('created_at', 'desc')->get();
        
        return view('home', compact('featuredDishes'));
    }
}
