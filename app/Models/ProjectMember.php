<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    use HasFactory;

       protected $table = 'project_members';
 
    public $incrementing = false;
 
    public $timestamps = false;
 
    protected $fillable = [
        'project_id',
        'user_id',
        'role',
        'permission',
        'added_at',
    ];
    protected $casts = [
        'added_at' => 'datetime',
    ];
}
