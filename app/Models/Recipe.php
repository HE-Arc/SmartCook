<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        //'name', 'ingredients', 'persons', 'description', 'instruction', 'cook_time', 'category'
        'name', 'persons', 'description', 'instruction', 'cook_time', 'category'
    ];

    function ingredients() {
        return $this -> belongsToMany(Ingredient::class)
            ->withPivot('quantity');
    }

    public function getIngredientFromIdRecipe($id_recipe) {
        $rec = Recipe::find($id_recipe);

        foreach ($rec->ingredients as $recipe) {
            $this->alert($recipe->pivot);
        }
    }


}
