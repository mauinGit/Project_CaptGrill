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
        // Pendapatan 30 hari terakhir
        $pendapatan = Order::whereDate('created_at', '>=', now()->subDays(30))
            ->sum('total_amount');

        // Pengeluaran 30 hari terakhir berdasarkan expense_items
        $pengeluaran = ExpenseItem::whereDate(DB::raw('DATE(created_at)'), '>=', now()->subDays(30))
            ->sum('subtotal');

        // Laba bersih
        $laba = $pendapatan - $pengeluaran;

        // Jumlah transaksi harian
        $tanggal = $this->filterDate ?? today();
        $jumlahTransaksi = Order::whereDate('created_at', $tanggal)->count();

        return [
            Stat::make('Total Pendapatan (30 Hari)', 'Rp ' . number_format($pendapatan, 0, ',', '.'))
                ->icon('heroicon-o-banknotes')
                ->color('success'),

            Stat::make('Total Pengeluaran (30 Hari)', 'Rp ' . number_format($pengeluaran, 0, ',', '.'))
                ->icon('heroicon-o-arrow-trending-down')
                ->color('danger'),

            Stat::make('Laba Bersih (30 Hari)', 'Rp ' . number_format($laba, 0, ',', '.'))
                ->icon('heroicon-o-chart-bar')
                ->color($laba >= 0 ? 'success' : 'danger'),

            Stat::make("Jumlah Transaksi", $jumlahTransaksi)
                ->icon('heroicon-o-receipt-percent')
                ->color('primary'),
        ];
    }
}