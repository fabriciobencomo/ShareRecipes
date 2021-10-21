<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title', 'category_id', 'preparation', 'ingredients', 'img'
    ];

    public function category(){
        return $this->belongsTo(CategoryRecipe::class, 'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'likes_recipe');
    }
}
