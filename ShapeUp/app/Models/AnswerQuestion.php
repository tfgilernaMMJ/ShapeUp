<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'frequently_asked_question_id',
        'answer_message',
    ];

    public function frequentlyAskedQuestion()
    {
        return $this->belongsTo(FrequentlyAskedQuestion::class);
    }
}