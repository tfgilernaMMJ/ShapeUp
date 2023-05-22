<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietIngredient extends Model
{
    use HasFactory;

    protected $table = 'diet_ingredients';

    public function diet()
    {
        return $this->belongsTo(Diet::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryOfDiet::class, 'category_of_diet_id');
    }
}