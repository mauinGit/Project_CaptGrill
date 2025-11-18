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
        $order = $this->record;
        $items = $this->data['items'] ?? [];

        // Reset pivot, insert ulang
        $order->menuItems()->detach();

        foreach ($items as $item) {
            $order->menuItems()->attach($item['menu_item_id'], [
                'quantity' => $item['quantity'],
                'price'    => $item['price'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        $order->update([
            'total_amount' => $order->menuItems->sum(fn ($i) => $i->pivot->subtotal),
            'quantity'     => $order->menuItems->sum(fn ($i) => $i->pivot->quantity),
        ]);
    }
}
