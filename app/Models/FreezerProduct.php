<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FreezerProduct extends BaseModel
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['freezer_id', 'product_id', 'user_id', 'type', 'unit', 'gram_quantity', 'adet_quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
