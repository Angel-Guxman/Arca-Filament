<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable 
{
    use HasRoles;
    use HasFactory, Notifiable;

public function favorites()
{
    return $this->belongsToMany(Product::class, 'favorites', 'user_id', 'product_id');
}

/**
 * Get all orders for the user.
 */
/**
 * Get all orders for the user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function orders()
{
    return $this->hasMany(Order::class, 'user_id');
}

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'remember_token',
        'phone',
        'first_street',
        'second_street',
        'outdoor_number',
        'interior_number',
        'address',
        'country',
        'municipality',
        'state',
        'post_code',
        'indications',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function cart(){
        return $this->hasOne(Cart::class);

    }
}
