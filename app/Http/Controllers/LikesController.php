<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class LikesController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        return auth()->user()->likes()->toggle($recipe);
    }
}
