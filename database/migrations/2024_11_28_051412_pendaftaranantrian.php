<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaranantrian', function (Blueprint $table) {
            $table->id('id_antrian');
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_dokter');
            $table->date('tanggal_antrian');
            $table->string('namaLengkap_pasien', 100);
            $table->enum('jenis_kelamin_pasien', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir_pasien');
            $table->string('email_pasien', 100);
            $table->string('no_telp_pasien', 15);
            $table->timestamps();

            $table->foreign('id_pengguna')
                  ->references('id_pengguna')
                  ->on('pengguna')
                  ->onDelete('cascade');

            $table->foreign('id_dokter')
                  ->references('id_dokter')
                  ->on('dokter')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaranantrian');
    }
};
