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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['Manager Perencanaan', 'Manager Unit', 'TL Rensis', 'TL Teknik', 'Pegawai']);
            $table->enum('ulp', ['ULP Bangil', 'ULP Gondang Wetan', 'ULP Grati', 'ULP Kraksaan', 'ULP Pandaan', 'ULP Pasuruan Kota', 'ULP Prigen', 'ULP Probolinggo', 'ULP Sukorejo'])->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
