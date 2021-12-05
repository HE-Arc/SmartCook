<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Recipe;

class RelationIngredientRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations = [
            ['fk_ingredient' => 1, 'fk_recipe' => 1, 'quantity' => 4],
            ['fk_ingredient' => 2, 'fk_recipe' => 1, 'quantity' => 4],
            ['fk_ingredient' => 1, 'fk_recipe' => 2, 'quantity' => 2]
        ];

        foreach ($relations as $relation)
        {
            array(
                'fk_ingredient' => $relation["fk_ingredient"],
                'fk_recipe' => $relation["fk_recipe"],
                'quantity' => $relation["quantity"]
            );
        }
    }

}
