<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Order;
use App\Models\ExpenseItem;
use Illuminate\Support\Facades\DB;

class FinanceLineChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Pemasukan & Pengeluaran (30 Hari)';

    protected static ?int $sort = 4;
    
    protected function getData(): array
    {
        $startDate = now()->subDays(30)->toDateString();

        // Ambil pendapatan per tanggal
        $pendapatan = Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total_amount) as total')
            )
            ->whereDate('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Ambil pengeluaran per tanggal
        $pengeluaran = ExpenseItem::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(subtotal) as total')
            )
            ->whereDate('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // List tanggal utk label chart
        $dates = collect(range(0, 30))
            ->map(fn($i) => now()->subDays(30 - $i)->format('Y-m-d'))
            ->toArray();

        // Normalisasi biar tanggal yg kosong tetap 0
        $pendapatanData = collect($dates)->map(fn($date) =>
            $pendapatan->firstWhere('date', $date)->total ?? 0
        )->toArray();

        $pengeluaranData = collect($dates)->map(fn($date) =>
            $pengeluaran->firstWhere('date', $date)->total ?? 0
        )->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan',
                    'data' => $pendapatanData,
                    'borderColor' => '#16A34A', // Hijau
                    'backgroundColor' => 'rgba(22, 163, 74, .3)',
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Pengeluaran',
                    'data' => $pengeluaranData,
                    'borderColor' => '#DC2626', // Merah
                    'backgroundColor' => 'rgba(220, 38, 38, .3)',
                    'tension' => 0.4,
                ],
            ],
            'labels' => $dates,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}