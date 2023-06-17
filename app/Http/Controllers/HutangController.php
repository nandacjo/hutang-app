<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHutangRequest;
use App\Http\Requests\UpdateHutangRequest;
use App\Models\Hutang;
use App\Models\Pelanggan;

class HutangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::get()->pluck('nama', 'id', 'alamat');

        return view('transaksi.transaksi_hutang', [
            'pelanggan' => $pelanggan,
            'listHutang' => Hutang::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Hutang $hutang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hutang $hutang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHutangRequest $request, Hutang $hutang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hutang $hutang)
    {
        //
    }
}
