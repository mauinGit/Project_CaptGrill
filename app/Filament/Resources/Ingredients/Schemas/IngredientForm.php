<?php

namespace App\Filament\Resources\Ingredients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class IngredientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Bahan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('stock')
                    ->label('Stok')
                    ->numeric()
                    ->required(),
                TextInput::make('unit')
                    ->label('Satuan')
                    ->required()
                    ->maxLength(50),
                TextInput::make('reorder_level')
                    ->label('Batas Minimum')
                    ->numeric(),
                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'bahan_utama' => 'Bahan Utama',
                        'sayuran' => 'Bahan Sayuran',
                        'saus_bumbu' => 'Saus dan Bumbu',
                        'bahan_tambahan' => 'Bahan Pendukung',
                        'kemasan' => 'Kemasan',
                    ])
                    ->required(),
            ]);
    }
}
