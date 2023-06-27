@extends('layouts.app-hutang')

@section('content')
  <div class="row  flex justify-content-center">
    <div class="col-6">
      <h1 class="h3 mb-3">Detail Hutang</h1>
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0"></h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h4>Detail Hutang: {{ $model->pelanggan->nama }}</h4>
              <hr>
              <div>
                <h5 class="fw-bold">Nama pelanggan : <span class="text-muted"> {{ $model->pelanggan->nama }}</span></h5>
                <h5 class="fw-bold">Alamat : <span class="text-muted"> {{ $model->pelanggan->alamat }}</span></h5>
                <h5 class="fw-bold">No. Hp : <span class="text-muted"> {{ $model->pelanggan->telepon }}</span></h5>
                <h5 class="fw-bold">Total Hutang : <span class="text-muted">
                    {{ formatRupiah($model->jumlah_hutang, true) }}</span></h5>
                <hr>
                <h5 class="fw-bold">Tanggal Transaksi : <span class="text-muted">
                    {{ $model->tanggal_hutang->translatedFormat('l, d-m-Y') }}</span></h5>
                <h5 class="fw-bold">Status : <span class="text-muted"> {{ $model->status }}</span></h5>
                <h5 class="fw-bold">Keterangan : <span class="text-muted"> {{ $model->keterangan }}</span></h5>
              </div>
            </div>
          </div>
          <div class="text-center mt-4">
            <a href="#" class="btn btn-primary btn-sm px-3 py-1 rounded"> <i class="align-middle"
                data-feather="printer"></i>
              Print</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
