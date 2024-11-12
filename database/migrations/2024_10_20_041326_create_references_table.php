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
        Schema::create('references', function (Blueprint $table) {
            $table->id('reference_id');
            $table->text('description')->nullable();
            $table->enum('type', ['link', 'file']);
            $table->string('path');
            $table->string('submission_code');
            $table->foreign('submission_code')->references('submission_code')->on('submissions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_files');
    }
};
