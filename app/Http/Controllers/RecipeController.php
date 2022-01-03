<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        $this->test();
        return inertia('Admin/Admin', compact('recipes'));
    }

    public function search(Request $request)
    {

    }

    public function create()
    {
        return inertia('Admin/Create');
    }

    public function show(Recipe $recipe)
    {
        return inertia('Admin/Show', compact('recipe'));
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

    public function test()
    {
        $ingredients = Ingredient::find(1);
        $this->alert($ingredients);

        foreach ($ingredients->recipes as $recipe) {
            //echo "<script type='text/javascript'>alert('$message');</script>";
            $this->alert($recipe->pivot);
        }
    }

    public function alert($message)
    {
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

}
