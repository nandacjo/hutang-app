@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori' }}
                </div>
                <div class="card-body">
                    @if (isset($kategori) && $kategori !== null)
                        {!! Form::model($kategori, ['route' => ['kategori.update', $kategori->id], 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'kategori.store', 'method' => 'POST']) !!}
                    @endif

                    <div class="form-group mb-3">
                        {!! Form::label('nama', 'Nama') !!}
                        {!! Form::text('nama', null, ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'Masukkan Nama']) !!}
                    </div>

                    <div class="form-group mb-3">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', null, [
                            'id' => 'slug',
                            'class' => 'form-control',
                            'placeholder' => 'Masukkan Slug',
                            'disabled',
                        ]) !!}
                    </div>


                    <div class="form-group mb-3">
                        {!! Form::submit(isset($kategori) ? 'Simpan Perubahan' : 'Tambah', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const nama = document.getElementById('nama');
        const slug = document.getElementById('slug');

        nama.addEventListener('keyup', function() {
            let val = nama.value;
            console.log(val);
            let slugFormat = val.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            slug.value = slugFormat;
        })
    </script>
@endsection
