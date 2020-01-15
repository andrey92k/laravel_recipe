<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    protected $fillable = ['name', 'slug', 'description'];


    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}