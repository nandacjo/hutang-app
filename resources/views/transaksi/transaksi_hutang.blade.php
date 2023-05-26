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
                {!! Form::open(['route' => 'transaksi.hutang.create', 'method' => 'POST']) !!}
                <div class="mb-3">
                    {{ Form::label('tanggal', 'Tanggal') }}
                    {!! Form::date('tanggal', now(), ['class' => 'form-control']) !!}
                    <span class="text-danger"></span>
                </div>
                <div class="mb-3">
                    {{ Form::label('nama', 'Nama Pelanggan') }}
                    {!! Form::select('pelanggan_id', $pelanggan, null, ['class' => 'form-control']) !!}
                    <span class="text-danger"></span>
                </div>
                <div class="mb-3">
                    {{ Form::label('jumlah', 'Jumlah') }}
                    {!! Form::number('jumlah', 0, ['class' => 'form-control']) !!}
                    <span class="text-danger"></span>
                </div>
                <div class="mb-3">
                    {{ Form::label('keterangan', 'Keterangan') }}
                    {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '3']) !!}
                    <span class="text-danger"></span>
                </div>
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>

        </div>

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <div class="col">
                    <h2 class="h4 mb-0">Daftar Orang Yang Berhutang</h2>
                    <table class="table table-responsive table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal Berhutang</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah Hutang</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listHutang as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal->translatedFormat('d-m-Y') }}
                                    </td>
                                    <td>{{ $item->pelanggan->nama }} <a href="#">Lihat Profil</a></td>
                                    <td>{{ $item->total_hutang }}</td>
                                    <td>Belum Lunas</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
