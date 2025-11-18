<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $items = $this->data['items'] ?? [];

        // hapus pivot lama
        $this->record->menuItems()->detach();

        // insert pivot baru
        foreach ($items as $item) {
            $this->record->menuItems()->attach($item['menu_item_id'], [
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        // update total
        $this->record->update([
            'quantity' => collect($items)->sum('quantity'),
            'total_amount' => collect($items)->sum('subtotal'),
        ]);
    }
}
