@extends('layouts.app-hutang')

<style>
  .toggle {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 82px;
    height: 32px;
    display: inline-block;
    position: relative;
    border-radius: 50px;
    overflow: hidden;
    outline: none;
    border: none;
    cursor: pointer;
    background-color: #707070;
    transition: background-color ease 0.3s;
  }

  .toggle:before {
    content: "lunas belum";
    display: block;
    position: absolute;
    z-index: 2;
    width: 28px;
    height: 28px;
    background: #fff;
    left: 2px;
    top: 2px;
    border-radius: 50%;
    font: 10px/28px Helvetica;
    text-transform: uppercase;
    font-weight: bold;
    text-indent: -40px;
    word-spacing: 37px;
    color: #fff;
    text-shadow: -1px -1px rgba(0, 0, 0, 0.15);
    white-space: nowrap;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    transition: all cubic-bezier(0.3, 1.5, 0.7, 1) 0.3s;
  }

  .toggle:checked {
    background-color: #4CD964;
  }

  .toggle:checked:before {
    left: 52px;
  }
</style>

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
                      <th scope="col">Tanggal Hutang</th>
                      <th scope="col">Tanggal Update</th>
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
                        <td>{{ $item->updated_at->translatedFormat('l, d-m-Y') }}</td>
                        <td>{{ $item->pelanggan->nama }} <a href="#">Lihat Profil</a></td>
                        <td>{{ formatRupiah($item->jumlah_hutang, true) }}</td>
                        <td>
                          <a href="/daftar-hutang/{{ $item->id }}/list-pembayaran"
                            class="btn btn-sm btn-secondary rounded"><i class="align-middle" data-feather="list"></i> List
                            Pembayaran</a>
                        </td>
                        <td>{{ formatRupiah($item->jumlah_hutang, true) }}</td>
                        <td class="text-center">
                          <input class="toggle" type="checkbox"
                            {{ $item->status == 'lunas' ? 'checked disabled' : '' }} />
                        </td>
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
