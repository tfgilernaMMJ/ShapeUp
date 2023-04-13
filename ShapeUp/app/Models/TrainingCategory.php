<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'category_of_training_id',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryOfTraining::class, 'category_of_training_id');
    }
}