<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'email',
        'status',
        'country',
        'age',
        'height',
        'weight',
        'photo',
        'biography',
        'experience',
        'suscription_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the subscription associated with the user.
     */
    public function suscription()
    {
        return $this->belongsTo(Suscription::class);
    }
    public function exercises()
    {
        return $this->hasMany(Exercise::class, 'user_coach_id');
    }
    public function trainings()
    {
        return $this->hasMany(Training::class, 'user_coach_id');
    }

    public function frequentlyAskedQuestions()
    {
        return $this->hasMany(FrequentlyAskedQuestion::class);
    }
    public function frequentlyAskedQuestion()
    {
        return $this->belongsTo(FrequentlyAskedQuestion::class, 'frequently_asked_question_id');
    }
}