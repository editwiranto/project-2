<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];


    public function User(): BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }

    public function OrderItem(): HasMany{
        return $this->hasMany(OrderItem::class);
    }
}
