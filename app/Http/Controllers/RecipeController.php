<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('ingredients')->get();
        return inertia('Admin/Admin', compact('recipes'));
    }

    public function create()
    {
        $ingredients = Ingredient::all();
        return inertia('Admin/Create', compact('ingredients'));
    }

    public function show($id)
    {
        ////$this->alert("SHOW");
        $recipe = Recipe::where('id', $id)->with('ingredients')->get();
        //$recipe = Recipe::where('id', $id)->firstOrFail();

        /////$this->alert($recipe);
        //dd($recipe);
        //return inertia('Admin/Show', compact('recipe'));
        //$ingredients = Ingredient::all();
        return inertia('Admin/Show', compact('recipe'));
    }

    public function edit($id)
    {
        $this->alert("EDIT");
        $recipe = Recipe::where('id', $id)->firstOrFail();
        return inertia('Admin/Edit', ['recipe' => $recipe]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'name' => 'required',
            'ingredients' => 'required',
            'persons' => 'required',
            'description' => 'required',
            'instruction' => 'required',
            'cook_time' => 'required',
            'category' => 'required'
            ]
        );

        Recipe::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Recipe created successfully');
    }

    public function destroy($id)
    {
        $this->alert("DESTROY");
        $recipe = Recipe::find($id);
        $recipe->delete();

        return redirect()->route('admin.index')->with('success', 'Recipe deleted successfully');
    }



    public function alert($message)
    {
        echo "<script type='text/javascript'>alert('$message');</script>";
    }


    public function getIngredientsFromIdRecipe($id_recipe) {
        $rec = Recipe::find($id_recipe);

        foreach ($rec->ingredients as $recipe) {
            $this->alert($recipe->pivot);
        }
    }

    public function getRecipesFromIdIngredient($id_ingredient)
    {
        $ingredients = Ingredient::find($id_ingredient);

        foreach ($ingredients->recipes as $recipe) {
            $this->alert($recipe->pivot);
        }
    }

}
