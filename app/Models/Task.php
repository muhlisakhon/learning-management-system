<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Solution;


class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'points',
        'subject_id',
    ];
   

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }
   

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }


}
