<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'products',
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'recipe_id');
    }
}
