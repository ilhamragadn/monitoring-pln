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
        Schema::create('calon_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('alamat_pelanggan')->nullable();
            $table->integer('jumlah_pelanggan')->nullable();
            $table->enum('jenis_permohonan', ['Perubahan Daya', 'Pasang Baru', 'Migrasi']);
            $table->enum('ulp', ['ULP Bangil', 'ULP Gondang Wetan', 'ULP Grati', 'ULP Kraksaan', 'ULP Pandaan', 'ULP Pasuruan Kota', 'ULP Prigen', 'ULP Probolinggo', 'ULP Sukorejo']);
            $table->string('tarif_lama')->nullable();
            $table->string('tarif_baru')->nullable();
            $table->integer('daya_lama')->nullable();
            $table->integer('daya_baru')->nullable();
            $table->integer('delta')->nullable();
            $table->integer('nilai_bp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_pelanggans');
    }
};
