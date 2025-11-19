<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Get;
use Filament\Schemas\Schema;
use App\Models\MenuItem;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                // ===========================
                // INFORMASI PELANGGAN
                // ===========================
                TextInput::make('customer_name')
                    ->label('Nama Pelanggan')
                    ->required()
                    ->columnSpan(1),

                Select::make('payment_method')
                    ->label('Metode Pembayaran')
                    ->options([
                        'cash' => 'Cash',
                        'qris' => 'Qris',
                        'gojek' => 'Gojek',
                    ])
                    ->required()
                    ->columnSpan(1),

                TextInput::make('total_amount')
                    ->label('Total Pembelian')
                    ->numeric()
                    ->disabled()
                    ->dehydrated(),

                TextInput::make('quantity')
                    ->label('Jumlah Item')
                    ->numeric()
                    ->disabled()
                    ->dehydrated(),
                    
                Repeater::make('items')
                ->schema([
                    Select::make('menu_item_id')
                        ->label('Menu')
                        ->options(MenuItem::pluck('name', 'id'))
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $menu = MenuItem::find($state);
                            if ($menu) {
                                $set('price', $menu->price);
                                $set('subtotal', $menu->price);
                                $set('quantity', 1);
                            }
                        })
                        ->required(),

                    TextInput::make('quantity')
                    ->label('Qty')
                    ->numeric()
                    ->reactive()
                    ->dehydrated()
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        $price = $get('price') ?? 0;
                        $set('subtotal', $state * $price);

                        // Re-hitung total dari semua item
                        $items = $get('../../items') ?? [];
                        $total = collect($items)->sum('subtotal');
                        $qtyTotal = collect($items)->sum('quantity');

                        $set('../../total_amount', $total);
                        $set('../../quantity', $qtyTotal);
                    }),

                    TextInput::make('price')
                        ->label('Harga')
                        ->numeric()
                        ->disabled(),

                    TextInput::make('subtotal')
                        ->label('Subtotal')
                        ->numeric()
                        ->disabled(),
                ])
                ->columns(4)
                ->dehydrated(false)

                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, $get) {

                        $items = $get('items') ?? [];

                        $total = collect($items)->sum('subtotal');
                        $qtyTotal = collect($items)->sum('quantity');

                        $set('../../total_amount', $total);
                        $set('../../quantity', $qtyTotal);
                    }),
                    
                    TextInput::make('cash_given')
                        ->label('Uang Diberikan')
                        ->numeric()
                        ->reactive()
                        ->minValue(fn ($get) => $get('total_amount') ?? 0)
                        ->afterStateUpdated(function ($state, callable $set, $get) {

                            // Ambil total_amount yang sudah kamu hitung dari repeater
                            $total = $get('total_amount') ?? 0;

                            // Set kembalian
                            $set('change_amount', max(0, $state - $total));
                        })
                        ->required(),

                    TextInput::make('change_amount')
                        ->label('Kembalian')
                        ->numeric()
                        ->disabled()
                        ->dehydrated(),

                                ])
            ->columns(2); // <-- biar layout rapi tanpa Section
    }
}