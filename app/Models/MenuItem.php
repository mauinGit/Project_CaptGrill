<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category',
        'image',
    ];

    public function ingredients() 
    {
        return $this->belongsToMany(Ingredient::class, 'menu_ingredients')
            ->withPivot(['quantity_used', 'unit'])
            ->withTimestamps();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot(['quantity', 'price', 'subtotal'])
            ->withTimestamps();
    }
}
