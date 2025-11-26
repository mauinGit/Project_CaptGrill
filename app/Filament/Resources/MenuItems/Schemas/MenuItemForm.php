<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
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
                    ->label('Foto Menu')
                    ->directory('menu')          // akan disimpan di storage/app/public/menu
                    ->disk('public')             // gunakan disk public
                    ->visibility('public')       // file bisa diakses browser
                    ->image()                    // validasi gambar
                    ->maxSize(2048)              // maksimal 2MB
                    ->preserveFilenames()        // opsional — simpan nama asli

            ]);
    }
}
