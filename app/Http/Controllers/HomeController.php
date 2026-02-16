<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedDish;

class HomeController extends Controller
{
    public function index()
    {
        $featuredDishes = FeaturedDish::orderBy('created_at', 'desc')->get();
        
        return view('home', compact('featuredDishes'));
    }
}
