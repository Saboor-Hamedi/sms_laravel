<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    /** @use HasFactory<\Database\Factories\ScoresFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function academic()
    {
        return $this->belongsTo(Academics::class, 'academic_year_id');
    }
}
