<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'author_name',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
