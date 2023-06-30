<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\BayarHutang;
use Illuminate\Http\Request;
use App\Models\TransaksiHutang;
use App\Http\Requests\StoreHutangRequest;
use App\Http\Requests\UpdateHutangRequest;

class HutangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $pelanggan = Pelanggan::get()->pluck('nama', 'id', 'alamat');

    //     return view('transaksi.transaksi_hutang', [
    //         'pelanggan' => $pelanggan,
    //         'listHutang' => Hutang::latest()->paginate(10),
    //     ]);
    // }

    public function index()
    {
        return view('daftarhutang.index', [
            'listHutang' => TransaksiHutang::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::get()->pluck('nama', 'id', 'alamat');

        return view('daftarhutang.create', [
            'pelanggan' => $pelanggan,
            'listHutang' => TransaksiHutang::latest()->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHutangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiHutang $daftar_hutang)
    {
        $model = $daftar_hutang;
        $pelanggan = Pelanggan::findOrFail($daftar_hutang->pelanggan_id);
        return view('daftarhutang.detail', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function tambah($id)
    {
        $pelanggan = Pelanggan::get()->pluck('nama', 'id');
        $hutang = TransaksiHutang::findOrFail($id);

        return view('daftarhutang.tambah', [
            'pelanggan' => $pelanggan,
            'hutang' => $hutang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'jumlah_hutang' => 'required',
            'keterangan' => 'required',
        ]);

        $requestData['jumlah_hutang'] = str_replace('.', '', $requestData['jumlah_hutang']);

        $hutang = TransaksiHutang::findOrFail($id);

        $hutang->jumlah_hutang = $requestData['jumlah_hutang'];
        $hutang->keterangan = $requestData['keterangan'];

        $hutang->update();

        flash('Transaksi hutang berhasil diupdate!')->success();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hutang $hutang)
    {
        //
    }

    public function listPembayaran($id)
    {
        $listPembayaran = BayarHutang::where('transaksi_hutangs_id', $id)->get();
        return view('daftarhutang.list-pembayaran', [
            'listPembayaran' => $listPembayaran
        ]);
    }
}
