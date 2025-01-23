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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Integer (Auto Increment)
            $table->string('name'); // Nama kategori (String)
            $table->text('description')->nullable(); // Deskripsi kategori (Text)
            $table->timestamps(); // Timestamps (Created At, Updated At)
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
