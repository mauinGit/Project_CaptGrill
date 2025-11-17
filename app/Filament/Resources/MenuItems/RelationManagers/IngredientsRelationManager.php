<?php

namespace App\Filament\Resources\MenuItems\RelationManagers;

use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Models\Ingredient;
use Dom\Text;

class IngredientsRelationManager extends RelationManager
{
    protected static string $relationship = 'ingredients';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('ingredient_id')
                ->label('Bahan')
                ->options(Ingredient::pluck('name', 'id')) 
                ->searchable()
                ->required(),

            TextInput::make('quantity_used')
                ->label('Jumlah Digunakan')
                ->numeric()
                ->required(),

            TextInput::make('unit')
                ->label('Satuan')
                ->placeholder('gram / pcs / slice')
                ->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')->label('Nama Bahan'),
                TextColumn::make('pivot.quantity_used')->label('Jumlah Digunakan'),
                TextColumn::make('pivot.unit')->label('Satuan'),
            ])
            ->headerActions([
                AttachAction::make()
                ->label('Tambah Bahan')
                ->preloadRecordSelect()
                ->recordSelect(function ($record) {
                    return $record->name; 
                })
                ->recordSelectSearchColumns(['name'])
                ->recordSelectOptionsQuery(fn ($query, $livewire) =>
                    $query->whereNotIn('id', $livewire->ownerRecord->ingredients->pluck('id'))
                )
                ->schema([
                    Select::make('recordId') 
                        ->label('Bahan')
                        ->options(Ingredient::pluck('name', 'id'))
                        ->searchable()
                        ->required(),

                    TextInput::make('quantity_used')
                        ->label('Jumlah Digunakan')
                        ->numeric()
                        ->required(),

                    Select::make('unit')
                        ->label('Satuan')
                        ->options([
                            'gram' => 'gram',
                            'gr' => 'gr',
                            'pcs' => 'pcs',
                            'slice' => 'slice',
                            'lembar' => 'lembar',
                            'porsi' => 'porsi',
                        ])
                        ->required(),
                ]),
            ])
            ->recordActions([
                EditAction::make()
                    ->schema([
                        TextInput::make('quantity_used')->numeric()->required(),
                        TextInput::make('unit')->required(),
                    ]),
                DetachAction::make(),
            ]);
    }
}
