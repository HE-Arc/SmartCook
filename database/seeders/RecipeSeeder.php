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
            ['name' => 'Crumble au pommes', 'persons' => 4, 'description' => "Je suis un crumble au pommes, bonjour.", 'instruction' => 'peler des pommes','cook_time' => "00:38:00", 'category' => 'dessert'],
            ['name' => 'Crumble au framboises', 'persons' => 4, 'description' => "Je suis un crumble au pommes, bonjour.", 'instruction' => 'peler des framboises','cook_time' => "00:15:00", 'category' => 'dessert'],
            ['name' => 'Crumble au poires', 'persons' => 4, 'description' => "Je suis un crumble au pommes, bonjour.", 'instruction' => 'peler des poires','cook_time' => "00:23:00", 'category' => 'dessert'],
            ['name' => 'Omelette au fromage', 'persons' => 1, 'description' => "Je suis une omelette au fromage, bonjour.", 'instruction' => 'peler du fromage','cook_time' => "00:08:00", 'category' => 'plat principal']
        ];

        foreach ($recipes as $recipe)
        {
            Recipe::create(array(
                'name' => $recipe["name"],
                'persons' => $recipe["persons"],
                'description' => $recipe["description"],
                'instruction' => $recipe["instruction"],
                'cook_time' => $recipe["cook_time"],
                'category' => $recipe["category"]
            ));
        }
    }
}
