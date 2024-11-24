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
        Schema::create('notifications', function (Blueprint $table) {
            $table->string('notification_id')->primary(); 
            $table->foreignUuid('user_id')->references('user_id')->on('users')->onDelete('cascade'); // Foreign key ke tabel users
            $table->boolean('isRead')->default(false);
            $table->string('message');
            $table->string('notifiable_id'); 
            $table->string('notifiable_type'); // Tipe morph untuk model
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};  