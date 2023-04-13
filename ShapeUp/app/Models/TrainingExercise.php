<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingExercise extends Model
{
    use HasFactory;

    protected $table = 'training_exercises';

    protected $fillable = [
        'training_id',
        'exercise_id'
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}