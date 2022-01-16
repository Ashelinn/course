<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'cover',
        'description',
        'introduction',
        'video',
        'block1',
        'img1',
        'block2',
        'img2',
        'exercise',
        'file',
        'author_id',
        'author',
        'price',
        'created_at'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'author_id');
    }

}
