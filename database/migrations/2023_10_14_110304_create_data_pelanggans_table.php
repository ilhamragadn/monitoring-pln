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
        Schema::create('data_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mngr_unit')->nullable();
            $table->foreign('id_mngr_unit')->on('users')->references('id')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->unsignedBigInteger('id_mngr_ren')->nullable();
            $table->foreign('id_mngr_ren')->on('users')->references('id')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->unsignedBigInteger('id_tl_rensis')->nullable();
            $table->foreign('id_tl_rensis')->on('users')->references('id')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->unsignedBigInteger('id_tl_teknik')->nullable();
            $table->foreign('id_tl_teknik')->on('users')->references('id')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->string('no_regis')->nullable();
            $table->string('nama_pelanggan');
            $table->string('alamat_pelanggan');
            $table->integer('jumlah_pelanggan');
            $table->enum('persetujuan_unit', ['TUNGGU', 'SETUJU', 'TOLAK'])->default('TUNGGU');
            $table->enum('persetujuan_ren', ['TUNGGU', 'SETUJU', 'TOLAK'])->default('TUNGGU');
            $table->enum('persetujuan_rensis', ['TUNGGU', 'SETUJU', 'TOLAK'])->default('TUNGGU');
            $table->enum('jenis_permohonan', ['Perubahan Daya', 'Pasang Baru', 'Migrasi']);
            $table->enum('ulp', ['ULP Bangil', 'ULP Gondang Wetan', 'ULP Grati', 'ULP Kraksaan', 'ULP Pandaan', 'ULP Pasuruan Kota', 'ULP Prigen', 'ULP Probolinggo', 'ULP Sukorejo']);
            $table->string('tarif_lama')->nullable();
            $table->string('tarif_baru');
            $table->integer('daya_lama')->nullable();
            $table->integer('daya_baru');
            $table->integer('delta')->nullable();
            $table->integer('nilai_bp')->nullable();
            $table->string('kepastian_pelanggan')->nullable();
            $table->string('vendor')->nullable();
            $table->string('lama_bayar')->nullable();
            $table->date('tgl_dpb_ulp')->nullable();
            $table->date('tgl_kajian_ren')->nullable();
            $table->date('tgl_logistik_kons')->nullable();
            $table->date('tgl_reservasi_kons')->nullable();
            $table->date('tgl_register_pp')->nullable();
            $table->date('tgl_bayar_pp')->nullable();
            $table->date('tgl_pdl_pp')->nullable();
            $table->string('foto_survei')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pelanggans');
    }
};
