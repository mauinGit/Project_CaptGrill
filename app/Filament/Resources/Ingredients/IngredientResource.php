<?php

namespace App\Filament\Resources\Ingredients;

use App\Filament\Resources\Ingredients\Pages\CreateIngredient;
use App\Filament\Resources\Ingredients\Pages\EditIngredient;
use App\Filament\Resources\Ingredients\Pages\ListIngredients;
use App\Filament\Resources\Ingredients\Schemas\IngredientForm;
use App\Filament\Resources\Ingredients\Tables\IngredientsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\Ingredient;
use Filament\Infolists\Components\TextEntry;

class IngredientResource extends Resource
{
    protected static ?string $model = Ingredient::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return IngredientForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IngredientsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Nama Bahan')
                    ->columnSpanFull(),
                TextEntry::make('stock')
                    ->label('Stok')
                    ->numeric(),
                TextEntry::make('unit')
                    ->label('Satuan'),
                TextEntry::make('reorder_level')
                    ->label('Status')
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
                TextEntry::make('created_at')
                    ->label('Created At')
                    ->dateTime('d M Y H:i'),
                TextEntry::make('updated_at')   
                    ->label('Updated At')
                    ->dateTime('d M Y H:i'),
            ]);
    }

    public static function getLabel(): string
    {
        return 'Ingredient';
    }

    public static function getPluralLabel(): string
    {
        return 'Bahan Bahan';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIngredients::route('/'),
            'create' => Pages\CreateIngredient::route('/create'),
            'edit' => Pages\EditIngredient::route('/{record}/edit'),
            'view' => Pages\ViewIngredients::route('ingredientsdetail/{record}'),
        ];
    }
}
