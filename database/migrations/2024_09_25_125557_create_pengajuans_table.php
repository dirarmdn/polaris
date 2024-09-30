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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->string('kode_pengajuan')->primary();
            $table->bigInteger('id_pengaju');
            $table->foreign('id_pengaju')->references('id_pengaju')->on('pengajus');
            $table->boolean('isVerified');
            $table->string('judul_pengajuan');
            $table->text('deskripsi_masalah');
            $table->text('tujuan_aplikasi');
            $table->text('proses_bisnis');
            $table->text('aturan_bisnis');
            $table->string('platform');
            $table->enum('jenis_proyek', ['Proyek yang sudah ada','Proyek Baru']);
            $table->string('stakeholder');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
