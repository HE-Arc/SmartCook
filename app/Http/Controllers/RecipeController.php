<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $recipe = Recipe::where('id', $id)->with('ingredients')->get();
        return inertia('Admin/Show', compact('recipe'));
    }

    public function edit($id)
    {
        $this->alert("EDIT");
        $recipe = Recipe::where('id', $id)->with('ingredients')->get();
        return inertia('Admin/Edit', compact('recipe'));
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

        $find_recipe = Recipe::where([
                ['name', '=', $request->name],
                ['persons', '=', $request->persons],
                ['description', '=', $request->description],
                ['instruction', '=', $request->instruction],
                ['cook_time', '=', $request->cook_time],
                ['category', '=', $request->category]
        ])->first();

        $diff_ingr[0] = 152;

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
                    ['ingredient_id' => $ingredient, 'recipe_id' => $recipe->id, 'quantity' => 4444444]
                ]);
            }
            return redirect()->route('admin.index')->with('success', 'Recipe created successfully');
        } else {
            return back()->withErrors(['message'=>'This recipe already exists. Please change it or go back ! :-)']);
        }
    }

    public function destroy($id)
    {
        $this->alert("DESTROY");
        $recipe = Recipe::find($id);
        $recipe->delete();

        return redirect()->route('admin.index')->with('success', 'Recipe deleted successfully');
    }

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

        foreach ($request->ingredients as $ingredient) {
            $recipe->ingredients()->updateExistingPivot($ingredient, $recipe->id);
        }

        return redirect()->route('admin.index')
            ->with('success','Recipe updated successfully');
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
