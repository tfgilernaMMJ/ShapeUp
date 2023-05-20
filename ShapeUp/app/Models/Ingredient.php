<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tag_of_ingredient_id',
    ];

    public function tag()
    {
        return $this->belongsTo(TagOfIngredient::class, 'tag_of_ingredient_id');
    }

    public function diet()
    {
        return $this->belongsToMany(Diet::class, 'diet_ingredients');
    }
}