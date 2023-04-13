<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'proposal',
        'duration',
        'repetitions',
        'series',
        'explanatory_video',
        'tag_of_exercise_id',
    ];

    public function tag()
    {
        return $this->belongsTo(TagOfExercise::class, 'tag_of_exercise_id');
    }
}