<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_hutangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->index()->constrained('pelanggans');
            $table->integer('jumlah_hutang');
            $table->dateTime('tanggal_hutang');
            $table->dateTime('tanggal_jatuh_tempo')->nullable();
            $table->string('status')->default('unpaid');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transaski_hutang');
    }
};
