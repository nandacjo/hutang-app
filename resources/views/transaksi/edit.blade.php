@extends('layouts.app')

@section('title', 'Transaksi')

@section('content')
    <h1 class="h-2 mb-3 text-uppercase text-bg-dark text-center p-2">Selamat datang di warung unyak, Terima kasih telah
        belanja di warung kami 😊😊</h1>

    <div class="row d-flex justify-content-center  mt-0">
        <div class="col-md-6 ">
            <h3 class="h4 text-center mt-4 mb-0 p-0">Form Transaksi Hutang</h3>
            <div class="card">
                <div class="card-body d-flex justify-content-center g-3">
                    <a href="#" class="btn btn-danger">Transaksi Hutang</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                {!! Form::open(['route' => ['transaksi.hutang.update', $hutang->id], 'method' => 'PUT']) !!}
                <div class="mb-3">
                    {{ Form::label('tanggal_hutang', 'Tanggal') }}
                    {!! Form::date('tanggal_hutang', now(), ['class' => 'form-control']) !!}
                    <span class="text-danger"></span>
                </div>
                <div class="mb-3">
                    {{ Form::label('nama', 'Nama Pelanggan') }}
                    {!! Form::select('pelanggan_id', $pelanggan, $hutang->pelanggan_id ?? null, [
                        'class' => 'form-control',
                        'placeholder' => '-- Pilih nama pelanggan --',
                    ]) !!}
                    <span class="text-danger"></span>
                </div>
                <div class="mb-3">
                    {{ Form::label('jumlah_hutang', 'Jumlah') }}
                    {!! Form::text('jumlah_hutang', $hutang->jumlah_hutang ?? null, ['class' => 'form-control rupiah']) !!}
                    <span class="text-danger"></span>
                </div>
                <div class="mb-3">
                    {{ Form::label('tanggal_jatuh_tempo', 'Tanggal jatuh tempo') }}
                    {!! Form::date('tanggal_jatuh_tempo', now()->addDays(7), ['class' => 'form-control']) !!}
                    <span class="text-danger"></span>
                </div>
                <div class="mb-3">
                    {{ Form::label('keterangan', 'Keterangan') }}
                    {!! Form::textarea('keterangan', $hutang->keterangan ?? null, ['class' => 'form-control', 'rows' => '3']) !!}
                    <span class="text-danger"></span>
                </div>
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>

        </div>
    </div>


@endsection
