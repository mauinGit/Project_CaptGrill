<?php

namespace App\Exports;

use App\Models\ExpenseItem;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExpenseSheet implements FromCollection
{
    public function __construct(private string $start, private string $end) {}

    public function collection()
    {
        return ExpenseItem::whereBetween(DB::raw('DATE(created_at)'), [$this->start, $this->end])
            ->get();
    }
}
