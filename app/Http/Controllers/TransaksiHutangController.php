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
            'jumlah' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        // TransaksiHutang::create($request->all());
        $hutang = new TransaksiHutang();
        $hutang->fill($requestData);
        $hutang->total_hutang = 3000;
        $hutang->save();

        flash('Transaksi hutang berhasil ditambahkan!')->success();

        return back();
    }
}
