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
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function parents()
    {
        return $this->belongsToMany(Parents::class, 'parent_students', 'student_id',  'parent_id');
    }
}
