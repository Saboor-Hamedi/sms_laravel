<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime', // Cast 'created_at' to a Carbon instance
        'updated_at' => 'datetime',
    ];

    // check Authentication
    public function auth(): bool
    {
        return $this->user_id == Auth::user()->id;
    }

    // Inverse of One-to-Many Relationship with User

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function authorName(): string
    {
        return Str::ucfirst($this->user->name ?? '');
    }

    public function getCategory()
    {
        return $this->category->name ?? 'Uncategorized';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Many-to-Many Relationship with tags

    public function tags(): BelongsToMany
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
        $value = preg_replace('/\s+/', ' ', trim($paragraph));
        // Remove special characters but keep spaces and alphanumeric characters
        return preg_replace('/[^A-Za-z0-9\s]/', '', $value);

    }

}
