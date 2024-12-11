<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id('id_dokter');
            $table->unsignedBigInteger('id_admin');
            $table->string('nama_dokter', 100);
            $table->string('spesialis', 100);
            $table->string('no_telp', 15);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('id_admin')
                  ->references('id_admin')
                  ->on('admin')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
