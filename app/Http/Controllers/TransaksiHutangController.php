<?php

namespace App\Http\Controllers;

use App\Models\BayarHutang;
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

    function edit($id)
    {
        $pelanggan = Pelanggan::get()->pluck('nama', 'id');
        $hutang = TransaksiHutang::findOrFail($id);

        return view('transaksi.edit', compact('pelanggan', 'hutang'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'tanggal_hutang' => 'required|date',
            'pelanggan_id' => 'required',
            'tanggal_jatuh_tempo' => 'nullable',
            'jumlah_hutang' => 'required',
            'keterangan' => 'required',
        ]);

        $requestData['jumlah_hutang'] = str_replace('.', '', $requestData['jumlah_hutang']);

        $hutang = TransaksiHutang::findOrFail($id);

        $hutang->tanggal_hutang = $requestData['tanggal_hutang'];
        $hutang->jumlah_hutang = $requestData['jumlah_hutang'];
        $hutang->pelanggan_id = $requestData['pelanggan_id'];
        $hutang->tanggal_jatuh_tempo = $requestData['tanggal_jatuh_tempo'];
        $hutang->keterangan = $requestData['keterangan'];

        $hutang->update();

        flash('Transaksi hutang berhasil diupdate!')->success();

        return back();
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_hutang' => 'required|date',
            'pelanggan_id' => 'required',
            'tanggal_jatuh_tempo' => 'nullable',
            'jumlah_hutang' => 'required',
            'keterangan' => 'required',
        ]);

        $requestData['jumlah_hutang'] = str_replace('.', '', $requestData['jumlah_hutang']);

        $pelangganHutang = TransaksiHutang::where('pelanggan_id', $request->pelanggan_id)->first();
        $totalHutang = 0;

        if ($pelangganHutang != null) {
            $totalHutang = $pelangganHutang->jumlah_hutang + $requestData['jumlah_hutang'];
        } else {
            $totalHutang = $requestData['jumlah_hutang'];
        }

        $hutang = new TransaksiHutang();
        $hutang->fill($requestData);
        $hutang->jumlah_hutang = $totalHutang;
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

        $total = DB::table('transaksi_hutangs')
            ->where('pelanggan_id', $pelangganId)
            ->select(DB::raw('SUM(jumlah_hutang) as total_hutang'))
            ->get();

        $pelanggan = Pelanggan::where('id', $pelangganId)->first();
        $totalHutang = $total->sum('total_hutang');
        return response()->json([
            'jumlah_hutang' => $totalHutang,
            'alamat' => $pelanggan->alamat,
            'telepon' => $pelanggan->telepon,
        ]);
    }

    public function bayarHutang(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_bayar' => 'required|date',
            'sisa_hutang' => 'nullable',
            'jumlah_bayar' => 'required',
        ]);

        $hutang = TransaksiHutang::where('pelanggan_id', $request->pelanggan_id)->first();
        if (!$hutang) {
            flash('Hutang tidak ada');
            return back();
        }
        $requestData['sisa_hutang'] = str_replace('.', '', $requestData['sisa_hutang']);
        $requestData['jumlah_bayar'] = str_replace('.', '', $requestData['jumlah_bayar']);
        $hutang->jumlah_hutang = $requestData['sisa_hutang'];

        if ($hutang->jumlah_hutang == 0) {
            $hutang->status = 'lunas'; // Set status hutang menjadi 'paid' atau sesuai kebutuhan
        } else {
            $hutang->status = 'belum lunas'; // Set status hutang menjadi 'paid' atau sesuai kebutuhan
        }
        $hutang->update();

        $bayar = new BayarHutang();
        $bayar->transaksi_hutangs_id = $hutang->id;
        $bayar->jumlah_bayar = $requestData['jumlah_bayar'];
        $bayar->tanggal_bayar = $requestData['tanggal_bayar'];

        flash('Hutang berhasil dibayar');
        $bayar->save();

        return redirect()->back();
    }
}
