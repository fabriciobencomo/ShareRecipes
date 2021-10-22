<?php

namespace App\Http\Controllers;

use App\CategoryRecipe;
use App\Recipe;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(CategoryRecipe $categoryRecipe){
        $recipes = Recipe::where('category_id', $categoryRecipe->id)->paginate(3);

        return view('categories.show', compact('recipes', 'categoryRecipe'));
    }
}
