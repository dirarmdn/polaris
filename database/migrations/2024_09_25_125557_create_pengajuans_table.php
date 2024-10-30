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
            $table->foreignUuid('user_id')->constrained('users');
            $table->boolean('isVerified');
            $table->string('judul_pengajuan');
            $table->text('deskripsi_masalah');
            $table->text('tujuan_aplikasi');
            $table->text('proses_bisnis');
            $table->text('aturan_bisnis');
            $table->enum('platform', ['web', 'mobile', 'desktop', 'multi-platform']);
            $table->boolean('jenis_proyek');
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
