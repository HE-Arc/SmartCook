<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;

class RelationIngredientRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredient_recipe')->insert([
            ['ingredient_id' => 1, 'recipe_id' => 1, 'quantity' => 4],
            ['ingredient_id' => 2, 'recipe_id' => 2, 'quantity' => 6],
            ['ingredient_id' => 1, 'recipe_id' => 3, 'quantity' => 2],
            ['ingredient_id' => 3, 'recipe_id' => 1, 'quantity' => 1],
            ['ingredient_id' => 4, 'recipe_id' => 1, 'quantity' => 10],
            ['ingredient_id' => 5, 'recipe_id' => 3, 'quantity' => 5],
            ['ingredient_id' => 6, 'recipe_id' => 5, 'quantity' => 7],
            ['ingredient_id' => 7, 'recipe_id' => 4, 'quantity' => 2],
            ['ingredient_id' => 8, 'recipe_id' => 3, 'quantity' => 2],
            ['ingredient_id' => 3, 'recipe_id' => 4, 'quantity' => 3],
            ['ingredient_id' => 8, 'recipe_id' => 5, 'quantity' => 4],
            ['ingredient_id' => 6, 'recipe_id' => 3, 'quantity' => 2]
        ]);

    }

}
