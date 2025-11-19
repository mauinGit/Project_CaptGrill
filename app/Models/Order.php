<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'total_amount',
        'payment_method',
        'customer_name',
        'quantity',
        'cash_given',
        'change_amount',
    ];


    protected static function booted()
    {
        static::created(function ($order) {
            foreach ($order->menuItems as $menuItem) {
                foreach ($menuItem->ingredients as $ingredient) {
                    $used = $ingredient->pivot->quantity_used * $menuItem->pivot->quantity;
                    $ingredient->decrement('stock', $used);
                }
            }
        });
        
        static::creating(function ($order) {
            $today = now()->format('Ymd');
            $count = self::whereDate('created_at', now()->toDateString())->count() + 1;

            do {
                $orderCode = 'ORD-' . $today . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);
                $exists = self::where('order_code', $orderCode)->exists();
                $count++;
            } while ($exists);

            $order->order_code = $orderCode;
        });
    }

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class, 'order_items')
            ->withPivot(['quantity', 'price', 'subtotal'])
            ->withTimestamps();
    }

    protected $casts = [
        'items' => 'array',
    ];

}
