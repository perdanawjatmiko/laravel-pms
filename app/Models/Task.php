<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['due_date'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function taskstatus()
    {
        return $this->belongsTo(TaskStatus::class, 'status');
    }
}
