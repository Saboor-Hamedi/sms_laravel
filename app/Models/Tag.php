<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class)->withPivot('tag_id', 'post_id');
    }
}
