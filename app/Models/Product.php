<?php

namespace App\Models;

use Illuminate\Support\Str;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'stock', 'image', 'category_id', 'slug', 'featured'];

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }




    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function items()
    {
        return $this->belongsToMany(Cart::class, 'cart_items');
    }

    protected $casts = [
        'price' => MoneyCast::class,
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = $model->generateUniqueSlug($model->name);
        });
          // Actualizar slug al actualizar si el nombre cambió
        static::updating(function ($product) {
            if ($product->isDirty('name')) {
                $product->slug = $product->generateUniqueSlug($product->name);
            }
        });

        // Eliminar imágenes asociadas al eliminar el producto
        static::deleting(function ($product) {
            foreach ($product->images as $image) {
                if ($image->image) {
                    Storage::delete($image->image);
                }
                $image->delete();
            }
        });
    }
    public function images()
    {
        return $this->hasMany(ImageProduct::class, 'product_id');
    }

    // En el modelo Product
    public function featuredImage()
    {
        return $this->hasOne(ImageProduct::class, 'product_id')->where('featured', 1);
    }
    public function getFeaturedImageUrlAttribute()
    {
        return $this->featuredImage  ? asset($this->featuredImage->image)
            : asset('images/default.png'); 
    
    }
    public function getFeaturedImageUrlFilamentAttribute()
    {
        return $this->featuredImage
            ? asset($this->featuredImage->image)
            : asset('images/default.png'); 
    }


    /**
     * Generate a unique slug for the product.
     *
     * @param string $name
     * @return string
     */
    private function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = 1;

        while (self::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count++;
        }

        return $slug;
    }
}
