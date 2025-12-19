<?php

use Illuminate\Support\Facades\Route;
use App\Exports\FinancialReportExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RiwayatPembelianController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Public route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        
        if ($user->role === 'admin' || $user->role === 'kasir') {
            return redirect()->route('kasir.index');
        }
        Auth::logout();
    }
    
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Kasir routes (role: kasir)
|--------------------------------------------------------------------------
*/
Route::middleware(['web', 'auth', 'role:kasir,admin'])->group(function () {

    Route::get('/kasir', [OrdersController::class, 'index'])->name('kasir.index');

    Route::post('/kasir/transaksi', [OrdersController::class, 'store'])->name('kasir.store');

    Route::get('/riwayat-pembelian', [RiwayatPembelianController::class, 'riwayatPembelian'])
        ->name('riwayat-pembelian');

    Route::get('/orders/{id}/details', [RiwayatPembelianController::class, 'getOrderDetails'])
        ->name('orders.details');

    Route::get('/orders/{id}/struk', [RiwayatPembelianController::class, 'struk'])
        ->name('orders.struk'); // Ubah nama 
        
    // Route::get('/orders/{id}/download', [RiwayatPembelianController::class, 'downloadStruk'])
    //     ->name('orders.struk.download');
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

Route::post('/admin/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('login');
})->name('filament.admin.auth.logout');  // nama route yang dicari UI

/*
|--------------------------------------------------------------------------
| Laravel Breeze Auth
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
