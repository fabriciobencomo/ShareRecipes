<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth' , ['except' => 'show']);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {   
        $recipes = Recipe::where('user_id', $profile->user_id)->paginate(3);
        
        return view('profiles.show', compact('profile', 'recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {   
        $this->authorize('view', $profile);
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {       
        $this->authorize('update', $profile);

        $data = request()->validate([
            'name' => 'required',
            'bio' => 'required',
            'url' => ''
        ]);

        if($request['img']){
            $imgPath = $request['img']->store('uploads-profiles', 'public'); 
            $img = Image::make( public_path("storage/{$imgPath}"))->fit(600,600);
            $img->save();
            $array_img = ['img' => $imgPath];
        }
        
        auth()->user()->name = $data['name'];
        auth()->user()->url = $data['url'];
        auth()->user()->save();

        unset($data['name']);
        unset($data['url']);

        auth()->user()->profile()->update(array_merge(
            $data,
            $array_img ?? []
        )
        );

        return redirect()->action('RecipeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
}
