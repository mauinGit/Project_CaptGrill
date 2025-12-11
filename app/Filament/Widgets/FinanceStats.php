<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Forms\Components\DatePicker;
use App\Models\Order;
use App\Models\ExpenseItem;
use Illuminate\Support\Facades\DB;

class FinanceStats extends StatsOverviewWidget
{
    public ?string $filterDate = null;

    protected static ?int $sort = 2;

    protected function getFormSchema(): array
    {
        return [
            DatePicker::make('filterDate')
                ->label('Filter tanggal transaksi')
                ->default(today())
                ->reactive(),
        ];
    }

    protected function getStats(): array
    {
        $now = now();

        // Statistik 30 hari
        $pendapatan30Hari = Order::whereDate('created_at', '>=', now()->subDays(30))
            ->sum('total_amount');

        $pengeluaran30Hari = ExpenseItem::whereDate(DB::raw('DATE(created_at)'), '>=', now()->subDays(30))
            ->sum('subtotal');

        $laba30Hari = $pendapatan30Hari - $pengeluaran30Hari;

        $transaksi30Hari = Order::whereDate('created_at', '>=', now()->subDays(30))
            ->count();

        // Statistik hari ini
        $pendapatanHariIni = Order::whereDate('created_at', today())
            ->sum('total_amount');

        $pengeluaranHariIni = ExpenseItem::whereDate('created_at', today())
            ->sum('subtotal');

        $labaHariIni = $pendapatanHariIni - $pengeluaranHariIni;

        $transaksiHariIni = Order::whereDate('created_at', today())
            ->count();

        $tanggal = $this->filterDate ?? today();

        return [
            // ============ STATISTIK 30 HARI ============
            Stat::make('Total Pendapatan (30 Hari)', 'Rp ' . number_format($pendapatan30Hari, 0, ',', '.'))
                ->icon('heroicon-o-banknotes')
                ->color('success')
                ->description('Rata-rata: Rp ' . number_format($pendapatan30Hari / 30, 0, ',', '.') . '/hari'),

            Stat::make('Total Pengeluaran (30 Hari)', 'Rp ' . number_format($pengeluaran30Hari, 0, ',', '.'))
                ->icon('heroicon-o-arrow-trending-down')
                ->color('danger')
                ->description('Rata-rata: Rp ' . number_format($pengeluaran30Hari / 30, 0, ',', '.') . '/hari'),

            Stat::make('Laba Bersih (30 Hari)', 'Rp ' . number_format($laba30Hari, 0, ',', '.'))
                ->icon('heroicon-o-chart-bar')
                ->color($laba30Hari >= 0 ? 'success' : 'danger')
                ->description($transaksi30Hari . ' transaksi'),

            // ============ STATISTIK HARI INI ============
            Stat::make('Pendapatan Hari Ini', 'Rp ' . number_format($pendapatanHariIni, 0, ',', '.'))
                ->icon('heroicon-o-banknotes')
                ->color('success')
                ->description(date('d F Y')),

            Stat::make('Pengeluaran Hari Ini', 'Rp ' . number_format($pengeluaranHariIni, 0, ',', '.'))
                ->icon('heroicon-o-arrow-trending-down')
                ->color('danger')
                ->description(date('d F Y')),

            Stat::make('Laba Bersih Hari Ini', 'Rp ' . number_format($labaHariIni, 0, ',', '.'))
                ->icon('heroicon-o-chart-bar')
                ->color($labaHariIni >= 0 ? 'success' : 'danger')
                ->description(date('d F Y')),

            Stat::make('Total Transaksi (30 Hari)', $transaksi30Hari)
                ->icon('heroicon-o-shopping-cart')
                ->color('primary')
                ->description('Rata-rata: ' . number_format($transaksi30Hari / 30, 1) . '/hari'),

            Stat::make('Transaksi Hari Ini', $transaksiHariIni)
                ->icon('heroicon-o-receipt-percent')
                ->color('primary')
                ->description('Tanggal: ' . $tanggal->format('d F Y')),

            Stat::make('📅 ' . $now->translatedFormat('d F Y'), $now->format('H:i'))
                ->icon('heroicon-o-clock')
                ->color('gray')
                ->description($now->translatedFormat('l'))
                ->columnSpan(1),
        ];
    }
}
