<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipes = [
            ['name' => 'Crumble au pommes', 'ingredients' => 1, 'persons' => 4, 'description' => "Je suis un crumble au pommes, bonjour.", 'instruction' => 'peler des pommes bordel','cook_time' => "00:38:00", 'category' => 'dessert'],
            ['name' => 'Crumble au framboises', 'ingredients' => 1, 'persons' => 4, 'description' => "Je suis un crumble au pommes, bonjour.", 'instruction' => 'peler des pommes bordel','cook_time' => "00:38:00", 'category' => 'dessert'],
            ['name' => 'Crumble au poires', 'ingredients' => 1, 'persons' => 4, 'description' => "Je suis un crumble au pommes, bonjour.", 'instruction' => 'peler des pommes bordel','cook_time' => "00:38:00", 'category' => 'dessert']
        ];

        foreach ($recipes as $recipe)
        {
            Recipe::create(array(
                'name' => $recipe["name"],
                'ingredients' => $recipe["ingredients"],
                'persons' => $recipe["persons"],
                'description' => $recipe["description"],
                'instruction' => $recipe["instruction"],
                'cook_time' => $recipe["cook_time"],
                'category' => $recipe["category"]
            ));
        }
    }
}
