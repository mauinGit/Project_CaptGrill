<?php

use Illuminate\Support\Facades\Route;
use App\Exports\FinancialReportExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RiwayatPembelianController;

/*
|--------------------------------------------------------------------------
| Public route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Kasir routes (role: kasir)
|--------------------------------------------------------------------------
*/
Route::middleware(['web','auth','role:kasir,admin'])->group(function () {

    Route::get('/kasir', [OrdersController::class, 'index'])->name('kasir.index');

    Route::post('/kasir/transaksi', [OrdersController::class, 'store'])->name('kasir.store');

    Route::get('/riwayat-pembelian', [RiwayatPembelianController::class, 'riwayatPembelian'])
        ->name('riwayat-pembelian');

    Route::get('/orders/{id}/details', [RiwayatPembelianController::class, 'getOrderDetails'])
        ->name('orders.details');

    Route::get('/orders/{id}/download', [RiwayatPembelianController::class, 'downloadStruk'])
        ->name('orders.struk.download');
});

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/financial-report/excel', function () {
        $start = request('start');
        $end   = request('end');

        return Excel::download(
            new FinancialReportExport($start, $end),
            "Laporan-Keuangan-{$start}-sampai-{$end}.xlsx"
        );
    })->name('financial-report.excel');
});

/*
|--------------------------------------------------------------------------
| Laravel Breeze Auth
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
