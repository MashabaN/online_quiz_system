<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'Question_ID',
        'Answer',
        'Is_correct'
    ];
}
