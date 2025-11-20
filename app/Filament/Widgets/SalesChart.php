<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class SalesChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Penjualan per Tanggal';

    protected function getChartHeight(): ?string
{
    return '100px'; // bebas: 300px, 400px, 600px, dll.
}

protected function getChartWidth(): ?string
{
    return '500px'; // bebas: 300px, 400px, 600px, dll.
}
    protected function getData(): array
    {
        $data = Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total')
            )
            ->whereDate('created_at', '>=', now()->subDays(30)) // ⬅️ FILTER 30 HARI
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Transaksi',
                    'data' => $data->pluck('total')->toArray(),
                    'borderColor' => '#4F46E5',
                    'backgroundColor' => 'rgba(79,70,229,0.3)',
                ],
            ],
            'labels' => $data->pluck('date')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
