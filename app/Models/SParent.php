<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SParent extends Model
{

    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'lastname',
        'job',
        'phone',
        'email',
        'address'
    ];
    public $timestamps = true;

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
