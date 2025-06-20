<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
   

    protected $fillable = [
        'task_id',
        'user_id',
        'content',
        'points_awarded',
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
   
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    protected $dates = [
        'evaluated_at'
    ];
}
