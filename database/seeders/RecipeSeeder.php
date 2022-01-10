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
            ['name' => 'Crumble aux pommes', 'persons' => 4, 'description' => "Je suis un crumble aux pommes, bonjour.", 'instruction' => 'peler des pommes','cook_time' => "00:38:00", 'category' => 'dessert'],
            ['name' => 'Crumble aux framboises', 'persons' => 4, 'description' => "Je suis un crumble aux framboises, bonsoir.", 'instruction' => 'peler des framboises','cook_time' => "00:15:00", 'category' => 'dessert'],
            ['name' => 'Crumble aux poires', 'persons' => 4, 'description' => "Je suis un crumble aux poires, hello.", 'instruction' => 'peler des poires','cook_time' => "00:23:00", 'category' => 'dessert'],
            ['name' => 'Omelette au fromage', 'persons' => 1, 'description' => "Je suis une omelette au fromage, bonjour.", 'instruction' => 'peler du fromage','cook_time' => "00:08:00", 'category' => 'plat principal'],
            ['name' => 'Gratin de pomme de terre', 'persons' => 6, 'description' => "Gratin avec une bechamel.", 'instruction' => 'Peler les pommes de terres. Raper le fromage. Préparer la bechamel.','cook_time' => "00:08:00", 'category' => 'plat principal']
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
