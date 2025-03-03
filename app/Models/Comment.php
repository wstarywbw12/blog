<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillabel = ['user_id','blog_id','comment'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
