<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title', 'category_id', 'preparation', 'ingredients', 'img'
    ];

    public function category(){
        return $this->belongsTo(CategoryRecipe::class);
    }
}
