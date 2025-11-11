<?php

namespace App\Filament\Resources\MenuItems\Widgets;

use App\Models\MenuItem;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MenuOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalMenu = MenuItem::count();

        $totalMakanan = MenuItem::where('category', 'Makanan')->count();

        $totalMinuman = MenuItem::where('category', 'Minuman')->count();

        return [
            Stat::make('Total Menu', $totalMenu)
                ->description('Jumlah semua menu yang tersedia')
                ->descriptionIcon('heroicon-o-clipboard-document-list')
                ->color('success'),

            Stat::make('Kategori Makanan', $totalMakanan)
                ->description('Total menu kategori makanan')
                ->descriptionIcon('heroicon-o-fire')
                ->color('warning'),

            Stat::make('Kategori Minuman', $totalMinuman)
                ->description('Total menu kategori minuman')
                ->descriptionIcon('heroicon-o-beaker')
                ->color('info'),
        ];
    }
}
