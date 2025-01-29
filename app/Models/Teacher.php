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
    ];

    public $timestamps = false;

    /**
     * The user that this teacher belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'teacher_id');
    }
}
