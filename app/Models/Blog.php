<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Blog extends Model
{
    protected $fillable = [
        'image',
        'title',
        'content',
        'categorie',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
