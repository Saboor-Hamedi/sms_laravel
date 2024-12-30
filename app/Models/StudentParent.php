<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;
    protected $fillable = ['lastname', 'phone', 'parent_id'];
    public $timestamps = true;
    public function students()
    {
        return $this->belongsToMany(
            User::class,
            'parent_student',
            'student_id',
            'parent_id',
        );
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
