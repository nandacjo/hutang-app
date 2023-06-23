@extends('layouts.app')

@section('content')
  <h1 class="h3 mb-3">List Pembayaran</h1>

  <div class="row">
    <div class="col-5">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0"></h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <table class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th>List Pembayaran Hutang</th>
                    <th>Tanggal Bayar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($listPembayaran as $item)
                    <tr>
                      <td>{{ formatRupiah($item->jumlah_bayar, true) }}</td>
                      <td>{{ $item->tanggal_bayar->translatedFormat('l, d-m-Y') }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="text-center">
            <a href="#" class="btn btn-primary btn-sm px-3 py-1 rounded"> <i class="align-middle"
                data-feather="printer"></i>
              Print</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
