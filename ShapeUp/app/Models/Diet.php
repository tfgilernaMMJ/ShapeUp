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
        return $this->belongsTo(User::class, 'user_coach_id');
    }

    public function categoriesOfDiet()
    {
        return $this->belongsToMany(CategoryOfDiet::class, 'diets_categories', 'diet_id', 'category_of_diet_id');
    }

    public function ingredient()
    {
        return $this->belongsToMany(Ingredient::class, 'diet_ingredients');
    }

    public function userFollowDiets()
    {
        return $this->hasMany(UserFollowDiet::class);
    }

}