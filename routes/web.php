<?php

use Illuminate\Support\Facades\Route;
use App\Exports\FinancialReportExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\RiwayatPembelianController;

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

Route::get('/riwayat-pembelian', [RiwayatPembelianController::class, 'riwayatPembelian'])
    ->name('riwayat-pembelian');

Route::get('/orders/{id}/details', [RiwayatPembelianController::class, 'getOrderDetails'])
    ->name('orders.details');

Route::get('/orders/{id}/download', [RiwayatPembelianController::class, 'downloadStruk'])->name('orders.struk.download');