<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;
      protected $fillable = [
        'task_id',
        'user_id',
        'reminder_datetime',
        'is_sent',
    ];
 
    protected $casts = [
        'reminder_datetime' => 'datetime',
        'is_sent'           => 'boolean',
    ];

     public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }
 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
