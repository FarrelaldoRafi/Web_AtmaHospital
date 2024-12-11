<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detailtambahpaketmcu', function (Blueprint $table) {
            $table->id('id_detailTambahPaketMCU');
            $table->unsignedBigInteger('id_paketMCU');
            $table->unsignedBigInteger('id_layanan');
            $table->timestamps();

            $table->foreign('id_paketMCU')
                  ->references('id_paketMCU')
                  ->on('paketmedicalcheckup')
                  ->onDelete('cascade');

            $table->foreign('id_layanan')
                  ->references('id_layanan')
                  ->on('layanan')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detailtambahpaketmcu');
    }
};