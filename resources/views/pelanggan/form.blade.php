@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ isset($pelanggan) ? 'Edit Pelanggan' : 'Tambah Pelanggan' }}
                </div>
                <div class="card-body">
                    @if (isset($pelanggan) && $pelanggan !== null)
                        {!! Form::model($pelanggan, ['route' => ['pelanggan.update', $pelanggan->id], 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'pelanggan.store', 'method' => 'POST']) !!}
                    @endif

                    <div class="form-group mb-3">
                        {!! Form::label('nama', 'Nama') !!}
                        {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama']) !!}
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('alamat', 'Alamat') !!}
                        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Masukkan Alamat']) !!}
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('telepon', 'Telepon') !!}
                        {!! Form::text('telepon', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nomor Telepon']) !!}
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::submit(isset($pelanggan) ? 'Simpan Perubahan' : 'Tambah', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
