<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function afterCreate(): void
    {
        $order = $this->record;
        $items = $this->data['items'] ?? [];

        foreach ($items as $item) {
            $order->menuItems()->attach($item['menu_item_id'], [
                'quantity' => $item['quantity'],
                'price'    => $item['price'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        // update total order
        $order->update([
            'total_amount' => $order->menuItems->sum(fn ($i) => $i->pivot->subtotal),
            'quantity'     => $order->menuItems->sum(fn ($i) => $i->pivot->quantity),
        ]);
    }
}
