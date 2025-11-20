<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord {
    protected static string $resource = OrderResource::class;
    protected function afterCreate(): void {
    $items = $this->data['items'] ?? [];

    // Attach each menu item to the order (existing code)
    foreach ($items as $item) {
        $this->record->menuItems()->attach($item['menu_item_id'], [
            'quantity' => $item['quantity'],
            'price'    => $item['price'],
            'subtotal' => $item['subtotal'],
        ]);
    }

    // Update total quantity and amount (existing code)
    $this->record->update([
        'quantity'     => collect($items)->sum('quantity'),
        'total_amount' => collect($items)->sum('subtotal'),
    ]);

    // **New: Deduct ingredient stock for each attached item**
    // Load the relationships to get pivot data
    $this->record->load('menuItems.ingredients');
    foreach ($this->record->menuItems as $menuItem) {
        foreach ($menuItem->ingredients as $ingredient) {
            $used = $ingredient->pivot->quantity_used * $menuItem->pivot->quantity;
            $ingredient->decrement('stock', $used);
        }
    }
}

}
