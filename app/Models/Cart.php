<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function products() :BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}