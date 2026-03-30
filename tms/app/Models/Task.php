<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
        protected $fillable = [
        'title',
        'description',
        'due_date',
          'priority',
          'status',
          'user_id',
          'project_id'
    ];
    protected $hidden = [
        'user_id',
        'project_id'
    ];
   protected $with = [
    'creator',
    'project',
    'comments'
   ];
      public function creator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
       public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
     public function comments()
    {
        return $this->hasMany(Comment::class, 'task_id', 'id');
    }
        public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'task_categories',
            'task_id',
            'category_id'
        );
    }

     public function reminders()
    {
        return $this->hasMany(Reminder::class, 'task_id', 'id');
    }
}
