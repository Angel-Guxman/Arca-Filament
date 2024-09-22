<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable=['id','name','description','price'];
    public function carts(){
        return $this->belongsToMany(Cart::class,'cart_items');      
    } 
    protected $casts = [
        'price' => MoneyCast::class,
    ];
}
