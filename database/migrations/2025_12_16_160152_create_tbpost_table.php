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
        Schema::create('tbpost', function (Blueprint $table) {
            $table->id('id_post');
            $table->string('judul_post', 255);
            $table->text('isi_post');
            $table->date('tgl_post');
            $table->string('id_kategori');
            $table->string('kategori');
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbpost');
    }
};
