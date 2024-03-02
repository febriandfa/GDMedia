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
        Schema::create('tugas_nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('murid_id');
            $table->foreign('murid_id')->references('id')->on('users');
            $table->unsignedBigInteger('tugas_id');
            $table->foreign('tugas_id')->references('id')->on('tugas');
            $table->string('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_nilais');
    }
};
