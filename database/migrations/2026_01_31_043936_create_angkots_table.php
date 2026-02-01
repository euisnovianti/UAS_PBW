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
        Schema::create('angkots', function (Blueprint $table) {
            $table->id();
            $table->string('no_angkot');
            $table->string('warna_mobil');
            $table->string('jurusan');
            $table->text('jalur_rute');
            $table->integer('harga');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angkots');
    }
};
