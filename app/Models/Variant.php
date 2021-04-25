<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variant extends Model
{
    protected $fillable = [
        'size', 'price'
    ];

    public function products()
    {
        return belongsToMany(Product::class);
    }
}
