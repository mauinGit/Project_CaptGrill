<?php

namespace App\Filament\Resources\Orders\Schemas;

use Dom\Text;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('customer_name')
                    ->label('Nama Pelanggan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('total_amount')
                    ->label('Total Pembelian')
                    ->numeric()
                    ->required(),
                Select::make('payment_method')
                    ->label('Metode Pembayaran')
                    ->options([
                        'cash' => 'Cash',
                        'qris' => 'Qris',
                        'gojek' => 'Gojek',
                    ])
                    ->required(),
                TextInput::make('quantity')
                    ->label('Jumlah Item')
                    ->numeric()
                    ->required(),
            ]);
    }
}
