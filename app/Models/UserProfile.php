<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /** @use HasFactory<\Database\Factories\UserProfileFactory> */
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'user_id', 'lastname', 'bio', 'profile_image', 'background_profile', 'school_name', 'universty_name',
    ];

    // Inverse of the One-to-One Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
