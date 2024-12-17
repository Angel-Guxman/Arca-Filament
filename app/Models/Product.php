<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    

    // Elimina 'category_id' de aquí si existía
    protected $fillable = ['name', 'description', 'price', 'stock', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_items');      
    } 

    protected $casts = [
        'price' => MoneyCast::class,
    ];
}

