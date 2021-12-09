<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return inertia('Admin/Admin', compact('recipes'));
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

}
