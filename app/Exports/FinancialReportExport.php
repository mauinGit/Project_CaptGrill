<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\SummarySheet;
use App\Exports\IncomeSheet;
use App\Exports\ExpenseSheet;
use App\Exports\TopSalesSheet;

class FinancialReportExport implements WithMultipleSheets
{
    public function __construct(
        private string $start,
        private string $end,
    ) {}

    public function sheets(): array
    {
        return [
            new IncomeSheet($this->start, $this->end),
            new ExpenseSheet($this->start, $this->end),
            new TopSalesSheet($this->start, $this->end),
        ];
    }
}
