<?php

namespace App\Http\Controllers;

use App\CategoryRecipe;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    
    public function index()
    {   
        $user = auth()->user();

        $recipes = Recipe::where('user_id', $user->id)->paginate(2);

        return view('recipes.index', compact('recipes', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $categories = CategoryRecipe::all(['id','name']);

        return view('recipes.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->validate([
            'title' => 'required|min:5',
            'category' => 'required',
            'preparation' => 'required',
            'ingredients' => 'required',
            'img' => 'required|image'
        ]);

        $imgPath = $request['img']->store('uploads-recipes', 'public');

        $img = Image::make( public_path("storage/{$imgPath}"))->fit(1000,550);
        $img->save();

        auth()->user()->recipes()->create([
            'title' => $data['title'],
            'preparation' => $data['preparation'],
            'ingredients' => $data['ingredients'],
            'img' => $imgPath,
            'category_id' => $data['category']
        ]);

        return redirect()->action('RecipeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $recipe = Recipe::findOrFail($id);

        //watch if the current user liked the recipe
        $like = (auth()->user()) ? auth()->user()->likes->contains($recipe->id): false;
        $likes = $recipe->likes->count();

        return view('recipes.show', compact('recipe', 'like', 'likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $recipe = Recipe::findOrFail($id);
        $this->authorize('view', $recipe);
        $categories = CategoryRecipe::all(['id','name']);

        return view('recipes.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $recipe = Recipe::findOrFail($id);

        $this->authorize('udpate', $recipe);

        $data = $request->validate([
            'title' => 'required|min:5',
            'category' => 'required',
            'preparation' => 'required',
            'ingredients' => 'required',
        ]);

        $recipe->title = $data['title'];
        $recipe->preparation = $data['preparation'];
        $recipe->ingredients = $data['ingredients'];
        $recipe->category_id = $data['category'];

        if(request('img')){
            $imgPath = $request['img']->store('uploads-recipes', 'public'); 
            $img = Image::make( public_path("storage/{$imgPath}"))->fit(1000,550);
            $img->save();
            $recipe->img = $imgPath;
        }

        $recipe->save();


        return redirect()->action('RecipeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $recipe = Recipe::findOrFail($id);
        $this->authorize('delete', $recipe);
        $recipe->delete();
        return redirect()->action('RecipeController@index');
    }
}
