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
        Schema::create('notifikasi_seens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notifikasi_id');
            $table->unsignedBigInteger('user_id');
            $table->string('is_seen');
            $table->timestamps();

            $table->foreign('notifikasi_id')->references('id')->on('notifikasis');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi_seens');
    }
};
