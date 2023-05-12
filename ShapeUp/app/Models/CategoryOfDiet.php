<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOfDiet extends Model
{
    use HasFactory;
    protected $table = 'categories_of_diets';
    protected $fillable = [
        'name',
    ];

    public function diets()
    {
        return $this->hasMany(Diet::class, 'category_of_diet_id');
    }

    public function categoriesTrainingsDiets()
    {
        return $this->hasMany(CategoryTrainingDiet::class, 'category_of_diet_id');
    }
}