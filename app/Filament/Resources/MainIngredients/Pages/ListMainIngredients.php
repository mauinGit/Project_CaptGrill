<?php

namespace App\Filament\Resources\MainIngredients\Pages;

use App\Filament\Resources\MainIngredients\MainIngredientResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMainIngredients extends ListRecords
{
    protected static string $resource = MainIngredientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
