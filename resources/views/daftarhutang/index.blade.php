@extends('layouts.app-hutang')

@section('content')
  <h1 class="h3 mb-3">Daftar Hutang Pelanggan</h1>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Selamat Datang Admin</h5>

        </div>
        <div class="card-body">
          <div class="text-center d-flex justify-content-center gap-2">
            <a href="" class="btn btn-danger">Transaksi Hutang</a>
            <a href="" class="btn btn-warning">Transaksi Beli</a>
          </div>
          <div class="row d-flex justify-content-center mt-5">
            <div class="col">
              <h2 class="h4 mb-0">Daftar Orang Yang Berhutang</h2>
              <div class="table-responsive">
                <table class="table table-responsive table-striped table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah Hutang</th>
                      <th scope="col">Dibayar</th>
                      <th scope="col">Sisa Hutang</th>
                      <th scope="col">Status</th>
                      <th scope="col" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($listHutang as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_hutang->translatedFormat('d-m-Y') }}
                        </td>
                        <td>{{ $item->pelanggan->nama }} <a href="#">Lihat Profil</a></td>
                        <td>{{ formatRupiah($item->jumlah_hutang, true) }}</td>
                        <td>
                          <a href="/daftar-hutang/{{ $item->id }}/list-pembayaran"
                            class="btn btn-sm btn-secondary rounded"><i class="align-middle" data-feather="list"></i> List
                            Pembayaran</a>
                        </td>
                        <td>{{ formatRupiah($item->jumlah_hutang, true) }}</td>
                        <td>{{ $item->status }}</td>
                        <td align="middle">
                          <a href="/daftar-hutang/{{ $item->id }}/list-pembayaran"
                            class="btn btn-sm btn-success rounded"><i class="align-middle"
                              data-feather="dollar-sign"></i>Bayar</a>
                          <a href="/daftar-hutang/{{ $item->id }}/tambah-hutang"
                            class="btn btn-sm btn-primary rounded"><i class="align-middle" data-feather="plus-circle"></i>
                            Tambah
                          </a>
                          <a href="{{ route('daftar-hutang.show', $item->id) }}"
                            class="btn btn-sm btn-warning text-dark rounded"><i class="align-middle"
                              data-feather="alert-circle"></i> Detail</a>
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
@endsection
