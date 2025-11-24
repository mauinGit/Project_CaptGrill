<?php

namespace App\Filament\Resources\Ingredients\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class IngredientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Bahan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('stock')
                    ->label('Stok')
                    ->sortable(),
                TextColumn::make('unit')
                    ->label('Satuan')
                    ->sortable(),
                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->colors([
                        'danger'   => 'bahan_utama',     
                        'warning'  => 'sayuran',         // kuning
                        'info'     => 'kemasan',         // biru
                        'success'  => 'saus_bumbu',      // hijau
                        'secondary'=> 'bahan_tambahan',  // ungu
                    ]),
                TextColumn::make('reorder_level')
                    ->label('Status')
                    ->sortable()
                    ->formatStateUsing(function ($record) {
                        if ($record->stock <= 0) {
                            return '❌ Stock Habis';
                        } elseif ($record->stock <= $record->reorder_level) {
                            return '⚠️ Stock Mulai Menipis';
                        } else {
                            return '✅ Stock Aman';
                        }
                    })
                    ->color(function ($record) {
                        if ($record->stock <= 0) {
                            return 'danger';
                        } elseif ($record->stock <= $record->reorder_level) {
                            return 'warning';
                        } else {
                            return 'success';  //
                        }
                    }),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('d M Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime('d M Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Filter Kategori')
                    ->options([
                        'bahan_utama' => 'Bahan Utama',
                        'sayuran' => 'Sayuran',
                        'saus_bumbu' => 'Saus & Bumbu',
                        'bahan_tambahan' => 'Bahan Tambahan',
                        'kemasan' => 'Kemasan',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->reorderableColumns();
    }
}
