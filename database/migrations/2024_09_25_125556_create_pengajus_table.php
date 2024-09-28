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
        Schema::create('pengajus', function (Blueprint $table) {
            $table->id('id_pengaju');
            $table->string('kode_organisasi');
            $table->foreign('kode_organisasi')->references('kode_organisasi')->on('organisasis')->onDelete('cascade');
            $table->string('nama_pengaju');
            $table->string('email_pengaju')->unique();
            $table->string('jabatan');
            $table->string('no_telp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajus');
    }
};
