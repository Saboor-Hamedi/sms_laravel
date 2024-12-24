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
    // protected $primaryKey = 'user_id';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Summary of parents function
     * This function will return the student's parents
     * This parents function,this links student to parent table and returns the parent's information
     */

    public function parents()
    {
        return $this->hasOne(SParent::class, 'parent_id');
    }


    public function reports()
    {
        return $this->hasMany(StudentReport::class, 'user_id');
    }
}
