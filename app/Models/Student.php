<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */

    protected $guarded = ['id'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
