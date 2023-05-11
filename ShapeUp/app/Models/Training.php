<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'level',
        'coach_id',
    ];

    public function coach()
    {
        return $this->belongsTo(User::class, 'user_coach_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryOfTraining::class, 'category_of_training_id');
    }

    public function exercise()
    {
        return $this->belongsToMany(Exercise::class, 'training_exercises');
    }

    public function userFollowTrainings()
    {
        return $this->hasMany(UserFollowTraining::class);
    }

}