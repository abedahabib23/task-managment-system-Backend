<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
        protected $fillable = [
        'name',
        'description',
        'user_id',
    ];
    protected $hidden = ['user_id'];
    protected $with = ['owner','members','tasks'];

       public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
     public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id', 'id');
    }
        public function members()
    {
        return $this->belongsToMany(
            User::class,
            'project_members',
            'project_id',
            'user_id'
        )->withPivot('role', 'permission', 'added_at');
    }

}
