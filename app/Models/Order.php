<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'customer_name',
        'total_amount',
        'payment_method',
        'quantity',
    ];

    protected static function booted()
    {
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
}
