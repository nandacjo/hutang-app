<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\ListPembayaranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiHutangController;
use App\Models\TransaksiHutang;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {

    return view('dashboard.index', [
        'listHutang' => TransaksiHutang::latest()->paginate(10),
    ]);
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('kategori', CategoryController::class);
Route::resource('transaksi', TransaksiController::class);

Route::get('transaksi-hutang', [TransaksiHutangController::class, 'index'])->name('transaksi.hutang.index');
Route::post('transaksi-hutang', [TransaksiHutangController::class, 'store'])->name('transaksi.hutang.create');
Route::get('transaski-bayar-hutang', [TransaksiHutangController::class, 'transaksiBayarHutang'])->name('transaksi.bayar.hutang');
Route::post('transaski-bayar-hutang', [TransaksiHutangController::class, 'bayarHutang'])->name('transaksi.bayar.hutang');
Route::get('transaski-bayar-hutang/{id}/edit', [TransaksiHutangController::class, 'edit'])->name('transaksi.bayar.hutang.edit');
Route::put('transaski-hutang/{id}/update', [TransaksiHutangController::class, 'update'])->name('transaksi.hutang.update');
Route::put('transaski-hutang/{id}/show', [TransaksiHutangController::class, 'show'])->name('transaksi.hutang.show');
Route::get('get-pelanggan-debt/{pelangganId}', [TransaksiHutangController::class, 'getPelangganDebt'])->name('get.pelanggan.debt');
Route::get('list/{id}/pembayaran', [ListPembayaranController::class, 'show']);


Route::get('daftar-hutang/{id}/list-pembayaran', [HutangController::class, 'listPembayaran']);
Route::get('daftar-hutang/{id}/tambah-hutang', [HutangController::class, 'tambah'])->name('tambah.hutang');
Route::put('daftar-hutang/{id}/tambah-hutang', [HutangController::class, 'update'])->name('tambah.hutang');
Route::resource('daftar-hutang', HutangController::class);
