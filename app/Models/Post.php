<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    // HasSlug

    public $timestamps = false;

    // Inverse of One-to-Many Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function authorName()
    {
        return $this->user->name; // get the user name
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Many-to-Many Relationship with tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
}
