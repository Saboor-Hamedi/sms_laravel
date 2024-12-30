<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
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

    // teacher relationship
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
    // student relationship
    public function student()
    {
        return $this->hasOne(Student::class);
    }
    // scores relationship
    public function scores()
    {
        return $this->hasMany(Scores::class);
    }

    // display roles on users profile
    public function displayRoles()
    {
        if ($this->roles && $this->roles->isNotEmpty()) {
            return $this->roles->map(function ($role) {
                return $this->userRoles($role->name);
            })->implode(', ');
        } else {
            return 'Guest';
        }
    }
    public function userRoles($role): string
    {
        return '<a href="javascript:viod()" class="btn btn-sm btn-primary">#' . Str::ucfirst($role) . '</a>';
    }


    /*
      * many-to-many relationship, teachers, students, grades
      * @property Grade  
    */
    public function grades()
    {
        return $this->hasMany(Grade::class, 'teacher_id');
    }
    public function studentGrades()
    {
        return $this->belongsToMany(Grade::class, 'student_grades', 'student_', 'grade_id');
    }

    /**
     * This will help to get the parent of the user
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->hasOne(Parents::class);
    }
}
