<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;

    protected $fillable = ['name', 'image_url', 'type'];

    public function freezers()
    {
        return $this->belongsToMany(Freezer::class, 'freezer_products', 'product_id', 'freezer_id')
            ->withPivot('user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }
}
