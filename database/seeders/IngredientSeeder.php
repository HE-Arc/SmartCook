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
            ['name' => 'Pomme', 'category' => 'Fruit', 'measure' => 'pièce'],
            ['name' => 'Chou', 'category' => 'Légume', 'measure' => 'pièce'],
            ['name' => 'Sucre', 'category' => 'Sucre', 'measure' => 'pièce'],
            ['name' => 'Farine', 'category' => 'Céréale', 'measure' => 'pièce'],
            ['name' => 'Carotte', 'category' => 'Légume', 'measure' => 'pièce'],
            ['name' => 'Pomme de terre', 'category' => 'Légume', 'measure' => 'pièce'],
            ['name' => 'Oeuf', 'category' => 'Oeuf', 'measure' => 'pièce'],
            ['name' => 'Courgette', 'category' => 'Légume', 'measure' => 'pièce']
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
