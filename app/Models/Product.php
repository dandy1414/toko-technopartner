<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name', 'colors', 'description',
    ];

    public function category()
    {
        return belongsTo(Category::class);
    }

    public function productImages()
    {
        return hasMany(ProductImage::class);
    }

    public function variants()
    {
        return hasMany(Variant::class);
    }
}
