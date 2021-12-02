<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();

        return inertia('Home', compact('recipes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipe.show', compact('recipe'));
    }

    public function order()
    {
        $recipes = Recipe::latest()->where('persons', '<=', 0)->paginate(5);

        return view('recipes.order', compact('recipes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
