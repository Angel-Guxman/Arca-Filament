<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'quantity',
        'price',
        'created_at',
        'updated_at',
        'product_name',
        'product_image',
        'product_size',
        'product_color',
        'product_type',
        'product_category',
    ];


    // Relación con la orden
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    // Relación con el producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
