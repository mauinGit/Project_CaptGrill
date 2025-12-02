<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Schemas\Schema;

class MenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Menu Item')
                    ->required()
                    ->maxLength(255),
                TextInput::make('price')
                    ->label('Harga')
                    ->numeric()
                    ->required(),
                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'Makanan' => 'Makanan',
                        'Minuman' => 'Minuman',
                    ])
                    ->required(),
                FileUpload::make('image')
                    ->directory('menu')
                    ->disk('public')
                    ->moveFiles()
                    ->visibility('public')
                    ->deleteUploadedFileUsing(function ($file) {
                        if ($file) Storage::disk('public')->delete($file);
                    })
            ]);
    }
}
