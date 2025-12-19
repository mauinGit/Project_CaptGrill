<?php

namespace App\Filament\Resources\Expenses\Pages;

use App\Filament\Resources\Expenses\ExpenseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExpense extends EditRecord
{
    protected static string $resource = ExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    /**
     * Manipulasi data sebelum disimpan saat Edit
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // $data['total_amount'] = collect($data['items'] ?? [])->sum('subtotal');
        return $data;
    }

    protected function afterSave(): void
    {
        // Hitung ulang total dari database
        $this->record->update([
            'total_amount' => $this->record->items()->sum('subtotal'),
        ]);
    }
}
