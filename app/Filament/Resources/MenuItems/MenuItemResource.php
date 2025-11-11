<?php

namespace App\Filament\Resources\MenuItems;

use App\Filament\Resources\MenuItems\Pages\CreateMenuItem;
use App\Filament\Resources\MenuItems\Pages\EditMenuItem;
use App\Filament\Resources\MenuItems\Pages\ListMenuItems;
use App\Filament\Resources\MenuItems\Schemas\MenuItemForm;
use App\Filament\Resources\MenuItems\Tables\MenuItemsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\MenuItem;
use Dom\Text;
use Filament\Infolists\Components\TextEntry;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return MenuItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MenuItemsTable::configure($table);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Menu Item')
                    ->columnSpanFull(),
                TextEntry::make('price')
                    ->label('Harga')
                    ->money('idr', true),
                TextEntry::make('category')
                    ->label('Kategori'),
                TextEntry::make('created_at')
                    ->label('Created At')
                    ->dateTime('d M Y H:i'),
                TextEntry::make('updated_at')
                    ->label('Updated At')
                    ->dateTime('d M Y H:i'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getLabel(): string
    {
        return 'Menu';
    }

    public static function getPluralLabel(): string
    {
        return 'Detail Menu';
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
            'view' => Pages\ViewMenuItem::route('menudetail/{record}'),
        ];
    }
}
