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
        Schema::create('pelanggan_pasangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_hargapasang');
            $table->foreign('id_pelanggan')->on('data_pelanggans')->references('id')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('id_hargapasang')->on('harga_pasangs')->references('id')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->integer('banyak_material')->nullable();
            $table->integer('jumlah_total_mdu');
            $table->integer('jumlah_total_jasa');
            $table->integer('nilai_rab_mdu');
            $table->integer('nilai_rab_jasa');
            $table->float('ratio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan_pasangs');
    }
};
