<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItems = [
            [
                'name' => 'Caesar Salad',
                'description' => 'Fresh romaine lettuce, parmesan cheese, croutons, and our signature Caesar dressing',
                'price' => 8.99,
                'category' => 'Appetizers',
                'is_available' => true,
            ],
            [
                'name' => 'Garlic Bread',
                'description' => 'Toasted bread with garlic butter and herbs',
                'price' => 5.99,
                'category' => 'Appetizers',
                'is_available' => true,
            ],
            [
                'name' => 'Grilled Salmon',
                'description' => 'Fresh Atlantic salmon grilled to perfection, served with lemon butter sauce and seasonal vegetables',
                'price' => 18.99,
                'category' => 'Main Course',
                'is_available' => true,
            ],
            [
                'name' => 'Ribeye Steak',
                'description' => '12oz ribeye steak cooked to your preference, served with mashed potatoes and grilled vegetables',
                'price' => 24.99,
                'category' => 'Main Course',
                'is_available' => true,
            ],
            [
                'name' => 'Chicken Parmesan',
                'description' => 'Breaded chicken breast topped with marinara sauce and melted mozzarella, served over pasta',
                'price' => 16.99,
                'category' => 'Main Course',
                'is_available' => true,
            ],
            [
                'name' => 'Chocolate Cake',
                'description' => 'Decadent chocolate cake with rich chocolate frosting',
                'price' => 6.99,
                'category' => 'Desserts',
                'is_available' => true,
            ],
        ];

        foreach ($menuItems as $item) {
            MenuItem::create($item);
        }
    }
}
