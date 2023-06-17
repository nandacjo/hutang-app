@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-3">Halaman Dashboard</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Selamat Datang Admin</h5>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col">
                            <div class="col">
                                <h2 class="h4 mb-0">Daftar Orang Yang Berhutang</h2>
                                <div class="table-responsive">
                                    <table class="table table-responsive table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Tanggal Jatuh Tempo</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Jumlah Hutang</th>
                                                <th scope="col">Dibayar</th>
                                                <th scope="col">Sisa Hutang</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listHutang as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->tanggal_hutang->translatedFormat('d-m-Y') }}
                                                    </td>
                                                    <td>{{ $item->tanggal_jatuh_tempo->translatedFormat('d-m-Y') }}
                                                    </td>
                                                    <td>{{ $item->pelanggan->nama }} <a href="#">Lihat Profil</a></td>
                                                    <td>{{ formatRupiah($item->jumlah_hutang, true) }}</td>
                                                    <td>-</td>
                                                    <td>{{ formatRupiah($item->jumlah_hutang, true) }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>
                                                        <a href="{{ route('transaksi.bayar.hutang') }}"
                                                            class="btn btn-sm btn-success">Bayar</a>
                                                        <a href="{{ route('transaksi.bayar.hutang.edit', $item->id) }}"
                                                            class="btn btn-sm btn-success">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
