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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Berita / Nama Destinasi
            $table->string('location'); // Lokasi Wisata (misal: Lombok Utara)
            $table->text('description'); // Isi Berita / Ulasan
            $table->string('image_url')->nullable(); // URL Foto dari Internet
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};