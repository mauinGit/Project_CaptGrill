<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class TopSalesSheet implements FromCollection
{
    public function __construct(private string $start, private string $end) {}

    public function collection()
    {
        return Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('menu_items', 'menu_items.id', '=', 'order_items.menu_item_id')
            ->whereBetween(DB::raw('DATE(orders.created_at)'), [$this->start, $this->end])
            ->select('menu_items.name', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->groupBy('menu_items.name')
            ->orderByDesc('total_sold')
            ->limit(10)
            ->get();
    }
}
