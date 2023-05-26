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
                            <th scope="col">Stok</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button class="btn btn-success">Detail</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@mdo</td>
                            <td><button class="btn btn-success">Detail</button></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@mdo</td>
                            <td><button class="btn btn-success">Detail</button></td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
