<?php

namespace App\Filament\Resources\FoodMenuItems\Pages;

use App\Filament\Resources\FoodMenuItems\FoodMenuItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFoodMenuItems extends ListRecords
{
    protected static string $resource = FoodMenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
