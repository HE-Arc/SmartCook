<?php

/**
 * Authors : Meier Simon and Margueron Yasmine
 *
 * Date : 10.01.2022
 */

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;

/***
 *  Controller for the administrator part and revenue management.
 */
class RecipeController extends Controller
{
    /**
     * Main function for displaying recipes.
     */
    public function index()
    {
        $recipes = Recipe::with('ingredients')->get();
        return inertia('Admin/Admin', compact('recipes'));
    }

    /**
     * Function for creating a recipe.
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return inertia('Admin/Create', compact('ingredients'));
    }

    /**
     * Function to display a specific recipe.
     */
    public function show($id)
    {
        $recipe = Recipe::where('id', $id)->with('ingredients')->get();
        return inertia('Admin/Show', compact('recipe'));
    }

    /**
     * Function to edit a specific recipe.
     */
    public function edit($id)
    {
        $recipe = Recipe::where('id', $id)->with('ingredients')->get();
        $ingredients = Ingredient::all();
        return inertia('Admin/Edit', compact('recipe', 'ingredients'));
    }

    /**
     * Function to save a new recipe using the form.
     * Check that this recipe does not already exist.
     * Add the ingredients select from the pivot table.
     */
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

        $find_recipe = Recipe::where([
                ['name', '=', $request->name],
                ['persons', '=', $request->persons],
                ['description', '=', $request->description],
                ['instruction', '=', $request->instruction],
                ['cook_time', '=', $request->cook_time],
                ['category', '=', $request->category]
        ])->first();

        $diff_ingr[0] = 152; // initializing array with a value to avoid null exception.

        if($find_recipe != null)
        {
            $arr = [];
            foreach ($find_recipe->ingredients as $ingredient) {
                array_push($arr, $ingredient->id);
            }
            $diff_ingr = array_diff($request->ingredients,  $arr);
        }

        if(($find_recipe == null) && (count($diff_ingr) != 0))
        {
            $recipe = Recipe::create($request->all());

            foreach ($request->ingredients as $ingredient) {
                DB::table('ingredient_recipe')->insert([
                    ['ingredient_id' => $ingredient, 'recipe_id' => $recipe->id, 'quantity' => 4]
                    // 4 is a hard coded value for quantity because of lack of time;
                ]);
            }
            return redirect()->route('recipes.index')->with('success', 'Recipe created successfully');
        } else {
            return back()->withErrors(['message'=>'This recipe already exists. Please change it or go back ! :-)']);
        }
    }

    /**
     * Function to delete a recipe.
     * Will also remove existing links in the pivot table.
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully');
    }

    /**
     * Function to update a recipe.
     */
    public function update(Request $request, Recipe $recipe)
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

        $recipe->update($request->all());

        DB::table('ingredient_recipe')->where('recipe_id', $recipe->id)->delete();

        foreach ($request->ingredients as $ingredient) {
            DB::table('ingredient_recipe')->insert([
                ['ingredient_id' => $ingredient, 'recipe_id' => $recipe->id, 'quantity' => 4444444]
            ]);
        }

        return redirect()->route('recipes.index')
            ->with('success','Recipe updated successfully');
    }
}
