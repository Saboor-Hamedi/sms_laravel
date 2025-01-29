<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lastname',
        'phone',
        'address',
        'bio',
        'image',
    ];

    public $timestamps = true;

    /**
     * This method defines the many-to-many relationship between the parent and the student.
     * This relationship is defined by the pivot table `parent_students`.
     * The pivot table contains the `created_at` timestamp.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'parent_students',
            'parent_id',
            'student_id'
        )->withPivot('created_at');
    }

    /**
     * This method defines the relationship between the parent and the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
