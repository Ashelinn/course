<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'user_name',
        'course_id',
        'text',
        'created_at'
    ];

    /*
    public function courses()
    {
        return $this->hasMany(Course::class,'course_id');
    }
    */
}
