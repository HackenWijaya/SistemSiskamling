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
        Schema::create('laporan_pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nik');
            $table->timestamp('tanggal_pembuatan');
            $table->longText('deskripsi');
            $table->enum('status_pengaduan', ['proses', 'terima', 'tolak']);
            $table->string('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pengaduans');
    }
};
