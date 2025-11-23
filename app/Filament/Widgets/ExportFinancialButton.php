<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class ExportFinancialButton extends Widget
{
    protected static ?string $heading = 'Laporan Keuangan';

    protected static ?int $sort = 6;
    
    protected int | string | array $columnSpan = 'full';

    protected string $view = 'filament.widgets.export-financial-button';

}
