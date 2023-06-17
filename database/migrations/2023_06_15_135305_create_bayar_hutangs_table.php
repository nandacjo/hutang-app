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
        Schema::create('bayar_hutangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_hutangs_id')->index()->constrained('transaksi_hutangs');
            $table->integer('jumlah_bayar');
            $table->dateTime('tanggal_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayar_hutangs');
    }
};
