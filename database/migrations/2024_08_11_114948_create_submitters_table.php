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
        Schema::create('submitters', function (Blueprint $table) {
            $table->id('submitter_id');
            $table->foreignUuid('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('position_in_organization');
            $table->string('organization_code');
            $table->foreign('organization_code')->references('organization_code')->on('organizations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submitters');
    }
};
