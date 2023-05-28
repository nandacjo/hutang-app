<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\TransaksiHutang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiHutangController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::get()->pluck('nama', 'id', 'alamat');

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

    public function transaksiBayarHutang()
    {
        $pelanggan = Pelanggan::get()->pluck('nama', 'id');

        return view('transaksi.form_bayar_hutang', compact('pelanggan'));
    }

    public function getPelangganDebt($pelangganId)
    {
        // $pelanggan = TransaksiHutang::where('pelanggan_id', $pelangganId)->groupBy('pelanggan_id')->get();
        // $pelanggan = DB::table('table_transaski_hutang')
        //     ->select('id', 'total_hutang')
        //     ->groupBy('id')
        //     ->get();

        // $pelanggan = DB::table('table_transaski_hutang')
        // ->where('pelanggan_id', $pelangganId)
        // ->select(DB::raw('SUM(jumlah) as jumlah'))
        // ->orderBy('created_at', 'desc')
        // ->first();

        // $pelanggan = DB::table('table_transaski_hutang')
        // ->where('pelanggan_id', $pelangganId)
        // ->select('total_hutang')
        // ->orderBy('created_at', 'desc')
        // ->first();

        $total = DB::table('table_transaski_hutang')
            ->where('pelanggan_id', $pelangganId)
            ->select(DB::raw('SUM(jumlah) as total_hutang'))
            ->get();
        $pelanggan = Pelanggan::where('id', $pelangganId)->first();
        $totalHutang = $total->sum('total_hutang');
        return response()->json([
            'total_hutang' => $totalHutang,
            'alamat' => $pelanggan->alamat,
            'telepon' => $pelanggan->telepon,
        ]);
    }
}
