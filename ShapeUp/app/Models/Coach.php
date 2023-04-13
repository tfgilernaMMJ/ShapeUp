<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'password',
        'email',
        'email_verified_at',
        'country',
        'age',
        'photo',
        'biography',
        'experience',
        'rating',
        'remember_token',
    ];

    public function diets()
    {
        return $this->hasMany(Diet::class);
    }

    public function frequentlyAskedQuestions()
    {
        return $this->hasMany(FrequentlyAskedQuestion::class);
    }
}