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
        Schema::create('pelanggan_bongkars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_hargabongkar');
            $table->foreign('id_pelanggan')->on('data_pelanggans')->references('id')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('id_hargabongkar')->on('harga_bongkars')->references('id')->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->string('nama_material')->nullable();
            $table->integer('banyak_material')->nullable();
            $table->integer('nilai_rab_mdu')->nullable();
            $table->integer('nilai_rab_jasa')->nullable();
            $table->float('ratio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan_bongkars');
    }
};
