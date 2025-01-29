<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    /** @use HasFactory<\Database\Factories\PostsFactory> */
    protected $fillable = ['name', 'user_id'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
