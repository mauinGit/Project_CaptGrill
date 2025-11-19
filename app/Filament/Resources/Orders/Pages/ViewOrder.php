<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use App\Models\Order;
use Filament\Infolists\Components\Section;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Pages\ViewRecord;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),

           Action::make('print')
            ->label('Print Invoice')
            ->icon('heroicon-o-printer')
            ->color('primary')
            ->action(function (Order $record) {
                return response()->streamDownload(function () use ($record) {

                    $pdf = app('dompdf.wrapper')
                        ->loadView('pdf.order-invoice', [
                            'order' => $record,
                            'items' => $record->menuItems,
                        ])
                        ->setPaper([0, 0, 300, 800], 'portrait');  
                        // 162 pt = 58mm, height 800 pt agar muat

                    echo $pdf->output();

                }, 'struk-' . $record->order_code . '.pdf');
            }),
        ];
    }
}