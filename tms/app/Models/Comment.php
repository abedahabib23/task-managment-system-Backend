<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id',
        'user_id',
        'comment_text',
    ];
 
    protected $casts = [
        'created_at' => 'datetime',
    ];
     protected $hidden = ['user_id','task_id'];
    protected $with = ['user','task'];
    

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }
 
    /**
     * The user who wrote this comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
