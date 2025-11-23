<?php

use Illuminate\Support\Facades\Route;
use App\Exports\FinancialReportExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/financial-report/excel', function () {
    $start = request('start');
    $end = request('end');

    return Excel::download(
        new FinancialReportExport($start, $end),
        "Laporan-Keuangan-{$start}-sampai-{$end}.xlsx"
    );
})->name('financial-report.excel');

