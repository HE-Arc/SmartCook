<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Ingredient::truncate();
        Recipe::truncate();
        Schema::enableForeignKeyConstraints();

        \App\Models\User::factory(10)->create();
        $this->call(IngredientSeeder::class);
        $this->call(RecipeSeeder::class);
    }
}
