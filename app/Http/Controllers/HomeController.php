<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Inertia\Inertia;
use phpDocumentor\Reflection\Types\Null_;
use SebastianBergmann\Environment\Console;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $recipes = Recipe::with('ingredients')->get();
        return inertia('Home', compact('recipes'));
    }

    /**
     * Search the specified ingredient input
     * in search bar of the Home.vue page.
     *
     * @param  Request $request
     * @return \Inertia\Response
     */
    public function search(Request $request)
    {
        $recipes = Recipe::with('ingredients')->get();

        // temporary array to store the recipe that contains the wanted ingredient.
        $arr = [];

        foreach ($recipes as $recipe) {
            foreach ($recipe->ingredients as $ingredient) {
                if(str_contains($ingredient->name, $request->term)) {
                    array_push($arr, $recipe);
                }
            }
        }

        // assignation of the temporary array to the actual recipes to show.
        $recipes = $arr;

        return inertia('Home', compact('recipes'));
    }

}
