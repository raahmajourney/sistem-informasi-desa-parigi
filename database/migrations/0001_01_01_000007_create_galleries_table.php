<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();              // Judul
            $table->text('description')->nullable();          // Deskripsi
            $table->enum('type', ['image', 'video']);         // Jenis konten
            $table->string('file_path')->nullable();          // Path file lokal
            $table->text('video_url')->nullable();            // URL video (misalnya dari internet)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
}
