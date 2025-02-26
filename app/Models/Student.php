<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lastname',
        'birthdate',
        'phone',
        'country',
        'state',
        'address',
        'description',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * many to many relationship
     *
     * @author saboor
     *
     * @since 2021-05-10
     *
     * @version 1.0
     *
     * @see https://laravel.com/docs/8.x/eloquent-relationships#many-to-many
     * @see https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-polymorphic-relations
     * This belongs to the grades and students table
     */
    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'grade_student', 'student_id', 'grade_id');
    }

    /**
     * many to many relationship
     *
     * @return [type] [description]
     *
     * @author saboor
     *
     * @since 2021-05-10
     *
     * @version 1.0
     *
     * @see https://laravel.com/docs/8.x/eloquent-relationships#many-to-many
     * @see https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-polymorphic-relations
     * This belongs to the grades and teachers table
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    /**
     * many to many relationship
     *
     * @return [type] [description]
     *
     * @author saboor
     *
     * @since 2021-05-10
     *
     * @version 1.0
     *
     * @see https://laravel.com/docs/8.x/eloquent-relationships#many-to-many
     * @see https://laravel.com/docs/8.x/eloquent-relationships#many-to-many-polymorphic-relations
     * This belongs to the parents and students table
     */
    public function parents()
    {
        return $this->belongsToMany(Parents::class, 'parent_students', 'student_id', 'parent_id');
    }

    // Helper function to get the full name of the student
    public function currentGrade()
    {
        return $this->grades()->orderBy('academic_id', 'desc')->first();
    }
}
