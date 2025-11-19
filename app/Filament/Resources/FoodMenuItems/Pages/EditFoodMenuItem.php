<?php

namespace App\Filament\Resources\FoodMenuItems\Pages;

use App\Filament\Resources\FoodMenuItems\FoodMenuItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFoodMenuItem extends EditRecord
{
    protected static string $resource = FoodMenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
