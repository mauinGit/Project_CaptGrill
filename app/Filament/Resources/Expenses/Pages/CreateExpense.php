<?php

namespace App\Filament\Resources\Expenses\Pages;

use App\Filament\Resources\Expenses\ExpenseResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateExpense extends CreateRecord
{
    protected static string $resource = ExpenseResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['total_amount'] = collect($data['items'] ?? [])->sum('subtotal');
        $data['created_by'] = Auth::id();
        return $data;
    }

    protected function afterCreate(): void {
        $this->record->update([
            'total_amount' => $this->record->items()->sum('subtotal'),
        ]);
    }
}
