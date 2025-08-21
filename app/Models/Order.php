<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'payment_status', "total_price", "session_id", "created_at", "updated_at", "shipping_address", "shipping_price", "shipping_status", "payment_method", "divisa", "date_approved"];
    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all items for the order.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
