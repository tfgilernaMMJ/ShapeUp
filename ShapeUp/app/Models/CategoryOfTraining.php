<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOfTraining extends Model
{
    use HasFactory;

    protected $table = 'categories_of_trainings';

    protected $fillable = [
        'name',
    ];

    public function tagsOfExercises()
    {
        return $this->hasMany(TagOfExercise::class, 'category_of_training_id');
    }

    public function categoriesTrainingsDiets()
    {
        return $this->hasMany(CategoryTrainingDiet::class, 'category_of_training_id');
    }
}

