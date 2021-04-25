<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'image_link'
    ];

    public function product()
    {
        return belongsTo(Product::class);
    }
}
