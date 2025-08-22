<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis');
            $table->foreignId('nik');
            $table->timestamp('tanggal_bayar');
            $table->integer('jumlah_bayar');
            $table->enum('status_bayar', ['proses', 'terima', 'tolak']);
            $table->string('bukti_bayar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
