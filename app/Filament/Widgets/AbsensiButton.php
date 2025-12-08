<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AbsensiButton extends Widget
{
    protected string $view = 'filament.widgets.absensi-button';

    protected static ?string $heading = 'Laporan Absensi Karyawan';

    protected static ?int $sort = 7;

    protected int|string|array $columnSpan = [
        'default' => 1,
        'md' => 1,
        'lg' => 1,
        'xl' => 1,
    ];
}
