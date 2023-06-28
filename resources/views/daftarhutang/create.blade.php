@extends('layouts.app-hutang')

@section('title', 'Transaksi')

@section('content')
  <h1 class="h-2 mb-3 text-uppercase text-bg-dark text-center p-2">Selamat datang di warung unyak, Terima kasih telah
    belanja di warung kami 😊😊</h1>

  <x-header title="Transaksi Hutang" />
  <div class="container mt-2">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        {!! Form::open(['route' => 'transaksi.hutang.create', 'method' => 'POST']) !!}
        <x-form.tanggal name="tanggal_hutang" label="Tanggal Hutang" value="true" />
        <div class="mb-3">
          {{ Form::label('nama', 'Nama Pelanggan') }}
          {!! Form::select('pelanggan_id', $pelanggan, null, [
              'class' => 'form-control',
              'placeholder' => '-- Pilih nama pelanggan --',
          ]) !!}
          <span class="text-danger"></span>
        </div>
        <x-form.input type="text" name="jumlah_hutang" label='Jumlah' data="" placeholder="Jumlah" />
        <x-form.tanggal name="tanggal_jatuh_tempo" label="Tanggal Jatuh Tempo" value="false" />
        <x-form.input type="textarea" name="keterangan" label='Keterangan' data="" rows="3"
          placeholder="Keterangan" />
        <x-form.button name="Simpan" />
        {!! Form::close() !!}
      </div>
    </div>
  </div>


@endsection
