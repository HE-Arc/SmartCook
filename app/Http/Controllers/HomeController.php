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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return inertia('Home', compact('recipes'));
    }

    public function search(Request $request)
    {
//       $recipes = Recipe::when($request->term, function($query, $term) {
//            $query->where('name', 'LIKE', '%' . $term . '%');
//        })->paginate();
//
        // $recipes = Recipe::where('name', 'LIKE', '%' . 'Crumble au pommes' . '%')->get();

        $recipes = Recipe::when($request->term, function($query, $term) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        })->get();

        return inertia('Home', compact('recipes'));

        //echo "<script type='text/javascript'>alert('$request');</script>";
        //return inertia('Home', compact('recipes'));
//        return Inertia::render('Home', [
//            'recipes' => Recipe::where('id', 'LIKE', '%' . $term . '%')->with('name')->get()
//            Recipe::when($request->term, function($query, $term) {
//                $query->where('name', 'LIKE', '%' . $term . '%');
//            })->paginate()
//        ]);
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

}
