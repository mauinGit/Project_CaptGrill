<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class IncomeSheet implements FromCollection
{
    public function __construct(private string $start, private string $end) {}

    public function collection()
    {
        return Order::whereBetween(DB::raw('DATE(created_at)'), [$this->start, $this->end])
            ->select('id', 'created_at', 'total_amount')
            ->with('menuItems')
            ->get()
            ->map(fn($order) => [
                'Nomor Transaksi' => $order->id,
                'Tanggal' => $order->created_at->format('Y-m-d'),
                'Total' => $order->total_amount,
                'Detail Item' => $order->menuItems->map(fn($i) => "{$i->name} ({$i->pivot->quantity}x)")->implode(', ')
            ]);
    }
}
