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
//        $recipes = Recipe::where([
//                ['name', '!=', Null],
//                [function ($query) use ($request) {
//                    if (($term = $request->term)) {
//                        $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
//                    }
//                }]
//            ])
//            -> orderBy("id", "desc")
//            -> paginate(10);
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

    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Recipe::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    }

}
