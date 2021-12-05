<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            ['name' => 'Pomme', 'category' => 'Fruit', 'measure' => 'piece'],
            ['name' => 'Chou', 'category' => 'Légume', 'measure' => 'piece'],
            ['name' => 'Sucre', 'category' => 'Sucre', 'measure' => 'piece'],
            ['name' => 'Farine', 'category' => 'Céréale', 'measure' => 'piece']
        ];

        foreach ($ingredients as $ingredient)
        {
            Ingredient::create(array(
                'name' => $ingredient["name"],
                'category' => $ingredient["category"],
                'measure' => $ingredient["measure"]
            ));
        }
    }
}
