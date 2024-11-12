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
        Schema::create('submissions', function (Blueprint $table) {
            $table->string('submission_code')->primary();
            $table->foreignId('submitter_id')->references('submitter_id')->on('submitters')->onDelete('cascade');
            $table->string('nip_reviewer')->nullable();
            $table->foreign('nip_reviewer')->references('nip_reviewer')->on('reviewers');
            $table->enum('status', ['belum_direview', 'terverifikasi', 'ditolak', 'diarsipkan']);
            $table->string('submission_title');
            $table->text('problem_description');
            $table->text('application_purpose');
            $table->text('business_process');
            $table->text('business_rules');
            $table->enum('platform', ['web', 'mobile', 'desktop', 'multi-platform']);
            $table->boolean('project_type');
            $table->string('stakeholders');
            $table->text('review_description')->nullable();
            $table->timestamp('review_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
