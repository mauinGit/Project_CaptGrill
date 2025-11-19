<?php

namespace App\Filament\Resources\FoodMenuItems\Pages;

use App\Filament\Resources\FoodMenuItems\FoodMenuItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFoodMenuItem extends CreateRecord
{
    protected static string $resource = FoodMenuItemResource::class;
}
