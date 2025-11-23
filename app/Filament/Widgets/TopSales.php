<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TopSales extends TableWidget
{
    protected static ?string $heading = 'Top 5 Menu Terlaris';

    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';

    public ?string $dateOption = 'today';
    public ?string $manualDate = null;

    public static function canView(): bool
    {
        return true;
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\Filter::make('tanggal')
                ->schema([
                    Forms\Components\DatePicker::make('date')
                        ->label('Pilih Tanggal')
                        ->default(today())
                        ->reactive(),
                ])
                ->query(function ($query, $data) {
                    $date = $data['date'] ?? today()->toDateString();

                    return $query->whereDate('orders.created_at', $date);
                }),
        ];
    }


    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                return Order::query()
                    ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                    ->join('menu_items', 'menu_items.id', '=', 'order_items.menu_item_id')
                    ->select(
                        'menu_items.id as id',
                        'menu_items.name',
                        DB::raw('SUM(order_items.quantity) as total_sold')
                    )
                    ->groupBy('menu_items.id', 'menu_items.name')
                    ->orderByDesc('total_sold')
                    ->limit(5);
            })
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Menu'),

                Tables\Columns\TextColumn::make('total_sold')
                    ->label('Jumlah Terjual')
                    ->alignCenter(),
            ]);
    }
}