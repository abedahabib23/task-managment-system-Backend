<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Dom\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
  public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // 🔑 REQUIRED by JWT
    public function getJWTCustomClaims()
    {
        return [];
    }

     public function ownedProjects()
    {
        return $this->hasMany(Project::class, 'user_id', 'id');
    }
       public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id', 'id');
    }
     public function projects()
    {
        return $this->belongsToMany(
            Project::class,
            'project_members',
            'user_id',
            'project_id'
        )->withPivot('role', 'permission', 'added_at');
    }
        public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
       public function categories()
    {
        return $this->hasMany(Category::class, 'user_id', 'id');
    }

       public function reminders()
    {
        return $this->hasMany(Reminder::class, 'user_id', 'id');
    }



}
