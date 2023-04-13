<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTrainingDiet extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_of_training_id',
        'category_of_diet_id',
    ];

    public function categoryOfTraining()
    {
        return $this->belongsTo(CategoryOfTraining::class);
    }

    public function categoryOfDiet()
    {
        return $this->belongsTo(CategoryOfDiet::class);
    }
}