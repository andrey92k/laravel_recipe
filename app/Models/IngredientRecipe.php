<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngredientRecipe extends Model
{
    protected $fillable = ['recipe_id', 'ingredient_id', 'quantity'];


    // public function recipe()
    // {
    //     return $this->belongsToMany(Recipe::class);
    // }
}
