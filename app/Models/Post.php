<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, Searchable;
    // HasSlug

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime', // Cast 'created_at' to a Carbon instance
        'updated_at' => 'datetime',
    ];

    // check Authentication
    public function auth()
    {
        return $this->user_id == Auth::user()->id;
    }

    // Inverse of One-to-Many Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function authorName()
    {
        return $this->user->name;
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

    /**
     * Normalize a given paragraph by:
     * 1. Replacing multiple whitespace characters with a single space.
     * 2. Removing special characters but keeping spaces and alphanumeric characters.
     *
     * @return string
     */
    public function cleanParagraph(string $paragraph)
    {
        // Normalize multiple spaces to single spaces
        $string = preg_replace('/\s+/', ' ', trim($paragraph));
        // Remove special characters but keep spaces and alphanumeric characters
        $string = preg_replace('/[^A-Za-z0-9\s]/', '', $string);

        return $string;
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'paragraph' => $this->paragraph,
        ];
    }
}
