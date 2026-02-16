<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::where('is_available', true)
            ->orderBy('category')
            ->orderBy('name')
            ->get()
            ->groupBy('category');

        // Reorder categories to put "Plats principal" first if it exists
        $orderedMenuItems = collect();
        
        // Add "Plats principal" first if it exists
        if (isset($menuItems['Plats principal'])) {
            $orderedMenuItems['Plats principal'] = $menuItems['Plats principal'];
        }
        
        // Add other categories
        foreach ($menuItems as $category => $items) {
            if ($category !== 'Plats principal') {
                $orderedMenuItems[$category] = $items;
            }
        }

        return view('menu', compact('orderedMenuItems'));
    }
}
