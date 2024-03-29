@extends('layouts.app')

@section('title', 'Transaksi')

@section('content')
<h1 class="h-2 mb-5 text-uppercase text-bg-dark text-center p-2">Selamat datang di warung unyak</h1>

<div class="row d-flex justify-content-center  mt-0">
  <div class="col-md-6 ">
    <marquee class="h4 text-center mt-4 mb-0 p-0">Silahkan Pilih Jenis Transaski Anda</marquee>
    <div class="card">
      <div class="card-body d-flex justify-content-between g-3">
        <a href="{{ route('transaksi.hutang.index') }}" class="btn btn-danger">Transaksi Hutang</a>
        <a href="{{ route('transaksi.bayar.hutang') }}" class="btn btn-secondary">Bayar Hutang</a>
        <a href="#" class="btn btn-success">Transaksi Beli</a>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col">
      <h2 class="h4 mb-0">Daftar Proudct</h2>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Satuan</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col">Status</th>
            <th scope="col">Kategori</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Indomie</td>
            <td>Buah</td>
            <td>2.000</td>
            <td>40</td>
            <td><span class="badge bg-success">Tersedia</span></td>
            <td>Makanan</td>
            <td><button class="btn btn-outline-success btn-sm">Detail</button></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Indomie</td>
            <td>Buah</td>
            <td>2.000</td>
            <td>40</td>
            <td><span class="badge bg-success">Tersedia</span></td>
            <td>Makanan Ringan</td>
            <td><button class="btn btn-outline-success btn-sm">Detail</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
