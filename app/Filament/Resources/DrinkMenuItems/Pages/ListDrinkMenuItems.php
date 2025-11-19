<?php

namespace App\Filament\Resources\DrinkMenuItems\Pages;

use App\Filament\Resources\DrinkMenuItems\DrinkMenuItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDrinkMenuItems extends ListRecords
{
    protected static string $resource = DrinkMenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
