<?php

namespace App\Filament\Resources\MainIngredients\Pages;

use App\Filament\Resources\MainIngredients\MainIngredientResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMainIngredient extends EditRecord
{
    protected static string $resource = MainIngredientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
