<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_product',
        'description',
        'price',
        'category_id'
    ];


    public function Category(): BelongsTo{
        return $this->belongsTo(Category::class,'category_id');
    }

    public function OrderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
