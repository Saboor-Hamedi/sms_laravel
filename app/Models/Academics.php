<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academics extends Model
{
    /** @use HasFactory<\Database\Factories\AcademicsFactory> */


    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function scores()
    {
        return $this->hasMany(Scores::class);
    }
}
