<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageProduct extends Model
{
    use HasFactory;
    protected $table='image_products';

    protected $fillable = ['id', 'product_id', 'image', 'description', 'featured'];
      public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
      // Accessor para obtener la URL completa de la imagen
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return null;
    }

    // Boot method para manejar eventos del modelo
    protected static function boot()
    {
        parent::boot();

        // Eliminar archivo físico al eliminar el registro
        static::deleting(function ($imageProduct) {
            if ($imageProduct->image) {
                Storage::delete($imageProduct->image);
            }
        });
    }

}
