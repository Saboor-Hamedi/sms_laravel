<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public static function countUsers()
    {
        return User::count();
    }
    public function post()
    {
        return $this->hasMany(Posts::class);
    }
    public function scores()
    {
        return $this->hasMany(Scores::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function getRoles()
    {
        if ($this->roles->isNotEmpty()) {
            return $this->roles->map(function ($role) {
                return '<a href="#" class="btn btn-sm btn-primary">#' . $role->name . '</a>';
            })->implode('. ');
        } else {
            return 'Guest';
        }
    }
}
