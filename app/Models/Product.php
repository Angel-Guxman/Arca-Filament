<?php

namespace App\Models;

use Illuminate\Support\Str;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->featuredImage?->image ?? 'images/default.png';
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
