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
        'category_of_training_id',
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryOfTraining::class, 'category_of_training_id');
    }
}