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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // ID acara
            $table->string('title'); // Nama acara
            $table->text('description')->nullable(); // Deskripsi acara
            $table->date('event_date'); // Tanggal acara
            $table->datetime('start_time'); // Waktu mulai acara
            $table->datetime('end_time'); // Waktu akhir acara
            $table->unsignedBigInteger('category_id'); // Kategori acara
            $table->boolean('is_online')->default(false); // Status online/offline
            $table->string('image')->nullable(); // Gambar acara
            $table->decimal('price', 10, 2)->default(0); // Harga tiket
            $table->string('location')->nullable(); // Lokasi acara
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            // Relasi ke tabel categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
