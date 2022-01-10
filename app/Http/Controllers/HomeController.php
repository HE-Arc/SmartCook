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
        $recipes = Recipe::all();
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
        $recipes = Recipe::when($request->term, function($query, $term) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        })->get();

        return inertia('Home', compact('recipes'));
    }

}
