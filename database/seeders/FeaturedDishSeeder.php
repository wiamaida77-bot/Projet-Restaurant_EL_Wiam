<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeaturedDish;
use Illuminate\Support\Facades\File;

class FeaturedDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimer tous les plats vedettes existants
        FeaturedDish::query()->delete();
        
        // Uniquement les 3 plats vedettes désirés
        $dishes = [
            [
                'name' => 'Poulet ',
                'description' => 'Poulet tendre mijoté avec des épices marocaines et une sauce savoureuse.',
                'price' => 120.00,
                'image' => 'images/poulet.jpg'
            ],
            [
                'name' => 'Rfissa Traditionnelle',
                'description' => 'Rfissa traditionnelle au poulet, lentilles et épices, servie sur msemen.',
                'price' => 150.00,
                'image' => 'images/rfissa.jpg'
            ],
            [
                'name' => 'Couscous Royal',
                'description' => 'Couscous marocain avec semoule, légumes frais et viande parfumée.',
                'price' => 75.00,
                'image' => 'images/couscous.jpg'
            ]
        ];

        // Insérer uniquement les 3 plats vedettes
        foreach ($dishes as $dish) {
            FeaturedDish::create($dish);
        }
    }
}
