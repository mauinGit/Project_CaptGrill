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
                    ->label('Foto Menu')
                    ->directory('menu')
                    ->disk('public')
                    ->visibility('public')
                    ->image()
                    ->maxSize(10240) // 5MB
                    ->preserveFilenames()
                    ->nullable()                             // <— ini penting
                    ->deleteUploadedFileUsing(function ($file, $model) {
                        if ($model && $model->image) {
                            Storage::disk('public')->delete($model->image);
                        }
                    }),
            ]);
    }
}
