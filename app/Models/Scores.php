<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    /** @use HasFactory<\Database\Factories\ScoresFactory> */
    use HasFactory;

    protected $fillable = ['assignment', 'formative', 'midterm', 'final', 'average', 'report', 'academic_year_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function academic()
    {
        return $this->belongsTo(Academic::class, 'academic_year_id');
    }
}
