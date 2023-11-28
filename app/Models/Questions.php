<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    use HasFactory;
    protected $fillable = [
        'question'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class,'Question_ID','id');
    }
}
