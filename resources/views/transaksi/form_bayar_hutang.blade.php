@extends('layouts.app')

@section('title', 'Transaksi')

@section('content')
    <h1 class="h-2 mb-5 text-uppercase text-bg-dark text-center p-2">Selamat datang di warung unyak</h1>

    <div class="container">
        <div class="row d-flex justify-content-center  mt-0">
            <div class="col-8 ">
                <marquee class="h4 text-center mt-4 mb-0 p-0">Sisa Hutang Anda: <span class="sisa_hutang"></span></marquee>
                <div class="card bg-warning">
                    <div class="card-body d-flex justify-content-center g-3">
                        <h2 class="fw-bold text-uppercase">Transaksi Form Pembayaran Hutang</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <h2 class="h4 mb-0 font-weight-light">Form Bayar Hutang</h2>

                {!! Form::open([
                    'route' => 'transaksi.bayar.hutang',
                    'method' => 'POST',
                ]) !!}

                <div class="mb-3">
                    {{ Form::label('tanggal_bayar', 'Tanggal Bayar') }}
                    {!! Form::date('tanggal_bayar', now(), ['class' => 'form-control']) !!}
                    <span class="text-danger"></span>
                </div>

                <div class="form-group mb-3">
                    {{ Form::label('nama', 'Nama Pelanggan') }}
                    {!! Form::select('pelanggan_id', $pelanggan, null, [
                        'class' => 'form-control',
                        'id' => 'pelanggan',
                        'placeholder' => '-- Pilih Nama Pelanggan --',
                    ]) !!}
                    <span class="text-danger"></span>
                </div>


                <div class="form-group mb-3">
                    {{ Form::label('jumlah_hutang', 'Total Hutang') }}
                    {!! Form::text('jumlah_hutang', null, ['class' => 'form-control rupiah', 'id' => 'jumlah_hutang', 'readonly']) !!}
                    <span class="text-danger"></span>
                </div>

                <div class="form-group mb-3">
                    {{ Form::label('jumlah_bayar', 'Jumlah Yang di Bayarkan') }}
                    {!! Form::text('jumlah_bayar', null, ['class' => 'form-control rupiah', 'id' => 'jumlah_bayar']) !!}
                    <span class="text-danger"></span>
                </div>

                <div class="form-group mb-3">
                    {{ Form::label('sisa_hutang', 'Sisa Hutang') }}
                    {!! Form::text('sisa_hutang', null, ['class' => 'form-control rupiah', 'id' => 'sisa_hutang', 'readonly']) !!}
                    <span class="text-danger"></span>
                </div>

                <div class="d-flex justify-content-center">
                    {!! Form::submit('Bayar', ['class' => 'btn btn-primary px-5 mt-5 mt-2 text-center']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('#pelanggan').on('change', function() {
                var pelangganId = $(this).val();
                if (pelangganId) {
                    $.ajax({
                        url: '/get-pelanggan-debt/' + pelangganId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var debt = parseFloat(data.jumlah_hutang);
                            var formattedDebt = debt.toLocaleString('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).replace('Rp', '').replace(',00', '');
                            var format = formattedDebt.trim();
                            $('#jumlah_hutang').val(format);
                            $('#alamat').val(data.alamat);
                            $('#telepon').val(data.telepon);
                            // $('#total_hutang').val(data.total_hutang);
                        }
                    });
                }
            });

            $('#jumlah_bayar').keyup(function() {
                let totalHutang = $('#jumlah_hutang').val().replace('.', '');
                let jumlahBayaran = $(this).val().replace('.', '');

                const sisaHutang = Number(totalHutang) - Number(jumlahBayaran);
                var sisa = parseFloat(sisaHutang);
                var formatSisaHutang = sisa.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).replace('Rp', '').replace(',00', '');;

                $('#sisa_hutang').val(formatSisaHutang.trim()).addClass('rupiah');
                $('.sisa_hutang').html(formatSisaHutang.trim());
            })


        });
    </script>

    </script>

@endsection
