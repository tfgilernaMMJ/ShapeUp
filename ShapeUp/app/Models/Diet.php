<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'tips',
        'not_eat',
        'coach_id',
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function categoriesOfDiet()
    {
        return $this->belongsToMany(CategoryOfDiet::class, 'diets_categories', 'diet_id', 'category_of_diet_id');
    }
}