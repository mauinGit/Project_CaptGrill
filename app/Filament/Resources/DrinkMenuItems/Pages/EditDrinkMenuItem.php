<?php

namespace App\Filament\Resources\DrinkMenuItems\Pages;

use App\Filament\Resources\DrinkMenuItems\DrinkMenuItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDrinkMenuItem extends EditRecord
{
    protected static string $resource = DrinkMenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
