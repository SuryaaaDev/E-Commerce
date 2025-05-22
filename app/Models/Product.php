<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    
    protected $fillable = [
        'image',
        'name',
        'description',
        'price',
    ];

    public function user() :BelongsToMany
    {
        return $this->belongsToMany(User::class, 'carts')->withPivot('quantity');
    }
}
