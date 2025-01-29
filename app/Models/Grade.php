<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * @property integer $id
 * @property string $name
 * @package App\Models
 * @property Grade
 * This class works as classes for students, like class 1, class 2, class 3, etc.
 * It has property like name
 */

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['subject_name', 'teacher_id', 'academic_id'];

    public $timestamps = true;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'grade_student', 'grade_id', 'student_id')->withTimestamps();
    }

    // academic year, register students based on academic year
    public function academic()
    {
        return $this->belongsTo(Academics::class, 'academic_id');
    }
}
