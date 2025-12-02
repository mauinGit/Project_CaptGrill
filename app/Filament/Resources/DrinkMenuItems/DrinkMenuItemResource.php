<?php

namespace App\Filament\Resources\DrinkMenuItems;

use App\Filament\Resources\DrinkMenuItems\Pages\CreateDrinkMenuItem;
use App\Filament\Resources\DrinkMenuItems\Pages\EditDrinkMenuItem;
use App\Filament\Resources\DrinkMenuItems\Pages\ListDrinkMenuItems;
use App\Filament\Resources\DrinkMenuItems\Schemas\DrinkMenuItemForm;
use App\Filament\Resources\DrinkMenuItems\Tables\DrinkMenuItemsTable;
use App\Filament\Resources\MenuItems\Schemas\MenuItemForm;
use App\Filament\Resources\MenuItems\Tables\MenuItemsTable;
use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Builder;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DrinkMenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static string|UnitEnum|null $navigationGroup = 'Detail Menu';

    protected static ?string $navigationLabel = 'Minuman';
    
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ShoppingBag;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
         return MenuItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MenuItemsTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('category', 'minuman');
    }

    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\MenuItems\RelationManagers\IngredientsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDrinkMenuItems::route('/'),
            'create' => CreateDrinkMenuItem::route('/create'),
            'edit' => EditDrinkMenuItem::route('/{record}/edit'),
        ];
    }
}
