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

    public function create()
    {
        return inertia('Admin/Create');
    }

    public function show(Recipe $recipe)
    {
        $this->alert("SHOW");
        return inertia('Admin/Show', compact('recipe'));
    }

    public function edit($id)
    {
        $this->alert("EDIT");
        $recipe = Recipe::where('id', $id)->firstOrFail();
        return view('Admin/Edit', ['recipe' => $recipe]);
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
        //$this->alert($ingredients);

        foreach ($ingredients->recipes as $recipe) {
            //echo "<script type='text/javascript'>alert('$message');</script>";
            //$this->alert($recipe->pivot);
        }
    }

    public function alert($message)
    {
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

}
