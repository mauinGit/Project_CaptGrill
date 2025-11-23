<?php

namespace App\Filament\Resources\Expenses\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class ExpenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            DatePicker::make('date')
                ->label('Tanggal')
                ->default(now())
                ->required(),

            Select::make('category')
                ->label('Kategori Pengeluaran')
                ->options([
                    'gaji' => 'Gaji Karyawan',
                    'bahan' => 'Pembelian Bahan & Kemasan',
                    'pendukung' => 'Pengeluaran Pendukung',
                ])
                ->reactive()
                ->required(),

            Textarea::make('notes')
                ->label('Catatan Tambahan')
                ->columnSpanFull(),

            Repeater::make('items')
                ->relationship('items')
                ->label('Detail Pengeluaran')
                ->schema(function (callable $get) {
                    $category = $get('category');
                    return match ($category) {
                        'gaji' => [
                            Forms\Components\TextInput::make('employee_name')
                                ->label('Nama Karyawa')
                                ->required(),

                            TextInput::make('base_salary')
                                ->label('Gaji')
                                ->numeric()
                                ->reactive()   // ⬅ WAJIB supaya detect perubahan
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('subtotal', ($get('base_salary') ?? 0) + ($get('bonus') ?? 0));
                                })
                                ->required(),

                            Forms\Components\TextInput::make('bonus')
                                ->label('Bonus')
                                ->numeric()
                                ->default(0)
                                ->reactive()   // ⬅ supaya jika bonus berubah, subtotal update
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('subtotal', ($get('base_salary') ?? 0) + ($get('bonus') ?? 0));
                                }),

                            Forms\Components\TextInput::make('subtotal')
                                ->label('Total')
                                ->disabled()
                                ->dehydrated()
                                ->numeric(),
                        ],
                        'bahan' => [
                            TextInput::make('material_name')
                                ->label('Nama Bahan')
                                ->required(),

                             TextInput::make('base_salary')
                                ->label('Harga Barang')
                                ->numeric()
                                ->reactive()   // ⬅ WAJIB supaya detect perubahan
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('subtotal', ($get('base_salary') ?? 0));
                                })
                                ->required(),

                            TextInput::make('subtotal')
                                ->label('Total')
                                ->disabled()
                                ->dehydrated()
                                ->numeric(),
                            
                            TextInput::make('description')
                                ->label('Keterangan (misal: 3kg)')
                                ->required(),
                        ],
                        default => [
                            TextInput::make('material_name')
                                ->label('Nama Pengeluaran')
                                ->required(),
                            TextInput::make('base_salary')
                                ->label('Harga Barang')
                                ->numeric()
                                ->reactive()   // ⬅ WAJIB supaya detect perubahan
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    $set('subtotal', ($get('base_salary') ?? 0));
                                })
                                ->required(),
                            TextInput::make('subtotal')
                                ->label('Total')
                                ->disabled()
                                ->dehydrated()
                                ->numeric(),
                        ],
                    };
                })
                ->minItems(1)
                ->columnSpanFull()
                ->defaultItems(1)
                ->columns(4),
        ]);
    }
}
