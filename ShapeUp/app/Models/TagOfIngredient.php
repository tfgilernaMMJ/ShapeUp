<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagOfIngredient extends Model
{
    use HasFactory;

    protected $table = 'tags_of_ingredients';

    protected $fillable = [
        'name',
    ];
}