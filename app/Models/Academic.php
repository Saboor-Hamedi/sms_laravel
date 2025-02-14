<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function scores()
    {
        return $this->hasMany(Scores::class);
    }

    // register student for academic year 'grades/classes'
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
