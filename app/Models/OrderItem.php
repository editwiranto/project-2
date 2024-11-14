<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Order(): BelongsTo{
        return $this->belongsTo(Order::class,'order_id');
    }

    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
