<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\CategoryRecipe;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index(){

        $categories = CategoryRecipe::all();

        $latest = Recipe::latest()->take(5)->get();

        $mostLiked = Recipe::withCount('likes')->OrderBy('likes_count', 'DESC')->take(3)->get();

        $recipes = [];

        foreach($categories as $category){
            $recipes[Str::slug($category->name)][] = Recipe::where('category_id', $category->id)->take(3)->get();
        }

        return view('start.index', compact('latest', 'recipes', 'mostLiked'));
    }
}
