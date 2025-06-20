<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'code',
        'credit',
        'user_id',
    ];
    public function students()
    {
        return $this->belongsToMany(User::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
