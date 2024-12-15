<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * This is the Teacher model class
 * 
 * @author  <NAME>
 * @version 1.0.0
 * @since   2021-09-19

 * @package App\Models
 * @property Teacher

 * This class contents different information about the teachers 
 * This class can be extended to add more information about the teachers
*/

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    public function grade()
    {
        return $this->hasMany(Grade::class, 'teacher_id');
    }
}
