<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_answer',
        'question_attempted_count',
        'correct_answer_count',
        'total_question'
    ];
}
