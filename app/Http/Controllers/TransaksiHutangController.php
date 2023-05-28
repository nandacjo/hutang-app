<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\TransaksiHutang;
use Illuminate\Http\Request;

class TransaksiHutangController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::get()->pluck('nama', 'id');

        return view('transaksi.transaksi_hutang', [
            'pelanggan' => $pelanggan,
            'listHutang' => TransaksiHutang::latest()->paginate(10),
        ]);
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal' => 'required|date',
            'pelanggan_id' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $requestData['jumlah'] = str_replace('.', '', $requestData['jumlah']);

        $pelangganHutang = TransaksiHutang::where('pelanggan_id', $request->pelanggan_id)->first();
        $totalHutang = 0;

        if ($pelangganHutang != null) {
            $totalHutang = $pelangganHutang->total_hutang + $requestData['jumlah'] = str_replace('.', '', $requestData['jumlah']);
        } else {
            $totalHutang = $requestData['jumlah'] = str_replace('.', '', $requestData['jumlah']);
        }

        $hutang = new TransaksiHutang();
        $hutang->fill($requestData);
        $hutang->total_hutang = $totalHutang;
        $hutang->save();

        flash('Transaksi hutang berhasil ditambahkan!')->success();

        return back();
    }
}
