<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;
    
    protected $table = 'cart';
    public $timestamps = false;

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function orders(): HasOne
    {
        return $this->hasOne(Orders::class);
    }
}
