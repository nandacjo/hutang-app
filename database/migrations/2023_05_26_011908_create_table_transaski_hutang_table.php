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
        Schema::create('table_transaski_hutang', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->foreignId('pelanggan_id')->index();
            $table->bigInteger('jumlah');
            $table->text('keterangan');
            $table->bigInteger('total_hutang');
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
