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
        Schema::create('training_center_res', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_guest');
            $table->foreignId('id_trainingcenter');
            $table->time('in');
            $table->time('out');
            $table->string('surat');
            $table->string('nama_acara');
            $table->integer('jumlah_peserta');
            $table->integer('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_center_res');
    }
};
