<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagOfExercise extends Model
{
    use HasFactory;

    protected $table = 'tags_of_exercises';

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}