<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected $fillable = [
        'mentor_id', 
        'fullname',
        'text',
        'avatar'
    ];

    //связь с courses
    public function courses()
    {
        return $this->belongsTo(Course::class,'mentor_id');
    }
}
