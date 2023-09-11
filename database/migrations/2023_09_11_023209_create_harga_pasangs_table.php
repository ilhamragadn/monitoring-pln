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
        Schema::create('harga_pasangs', function (Blueprint $table) {
            $table->id();
            $table->string('material');
            $table->string('satuan');
            $table->float('rp_mdu');
            $table->float('rp_non_mdu_dan_jasa');
            $table->float('jasa');
            $table->float('rp_total');
            $table->string('klasifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_pasangs');
    }
};
