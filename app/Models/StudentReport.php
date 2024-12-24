<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReport extends Model
{
    use HasFactory;


    protected $fillable = ['content', 'user_id'];
    public $timestamps = true;
    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id');
    }
}
