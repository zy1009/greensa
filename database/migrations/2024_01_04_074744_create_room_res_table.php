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
        Schema::create('room_res', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_guest');
            $table->foreignId('id_room');
            $table->time('in');
            $table->time('out');
            $table->integer('jumlah_dewasa');
            $table->integer('jumlah_anak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_res');
    }
};
