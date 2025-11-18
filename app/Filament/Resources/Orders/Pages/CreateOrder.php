<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function afterCreate(): void
    {
        $items = $this->data['items'] ?? [];

        foreach ($items as $item) {
            $this->record->menuItems()->attach($item['menu_item_id'], [
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        // Hitung total ke orders table
        $this->record->update([
            'quantity' => collect($items)->sum('quantity'),
            'total_amount' => collect($items)->sum('subtotal'),
        ]);
    }
}
