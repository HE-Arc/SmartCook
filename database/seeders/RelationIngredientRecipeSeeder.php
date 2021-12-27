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
            ['ingredient_id' => 2, 'recipe_id' => 1, 'quantity' => 4],
            ['ingredient_id' => 1, 'recipe_id' => 3, 'quantity' => 2]
        ]);

    }

}
