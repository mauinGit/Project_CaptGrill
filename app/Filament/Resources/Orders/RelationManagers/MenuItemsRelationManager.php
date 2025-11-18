<?php

namespace App\Filament\Resources\Orders\RelationManagers;

use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'menuItems';

    protected static array $pivotData = ['quantity', 'price', 'subtotal'];

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')

            ->columns([
                TextColumn::make('name')
                    ->label('Menu'),

                TextColumn::make('pivot.quantity')
                    ->label('Jumlah Pesanan'),

                TextColumn::make('pivot.price')
                    ->label('Harga')
                    ->money('idr'),

                TextColumn::make('pivot.subtotal')
                    ->label('Subtotal')
                    ->money('idr'),
            ])

            ->recordActions([
                EditAction::make()
                    ->schema([
                        TextInput::make('quantity')
                            ->label('Jumlah Pesanan')
                            ->numeric()
                            ->required(),
                    ])
                    ->using(function ($record, array $data) {

                        $order  = $this->ownerRecord;
                        $price  = $record->price;
                        $subtotal = $data['quantity'] * $price;

                        // update pivot
                        $order->menuItems()->updateExistingPivot(
                            $record->id,
                            [
                                'quantity' => $data['quantity'],
                                'price'    => $price,
                                'subtotal' => $subtotal,
                            ]
                        );

                        // recalculation
                        $this->updateOrderTotals($order);

                        return $record;
                    }),

                DetachAction::make()
                    ->after(function ($record) {
                        $this->updateOrderTotals($record->order);
                    }),
            ]);
    }

    /**
     * Auto update total_amount & quantity
     */
    private function updateOrderTotals($order)
    {
        if (!$order) return;

        // total harga
        $order->total_amount = $order->menuItems
            ->sum(fn ($item) => $item->pivot->subtotal);

        // total qty
        $order->quantity = $order->menuItems
            ->sum(fn ($item) => $item->pivot->quantity);

        $order->save();
    }
}