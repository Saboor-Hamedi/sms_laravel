<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment',
        'formative',
        'midterm',
        'final',
        'average',
        'report',
        'academic_year_id',
        'user_id',
        'grade_id', 'student_id',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function academic()
    {
        return $this->belongsTo(Academic::class, 'academic_year_id');
    }
}
