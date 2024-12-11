<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaranmedicalcheckup', function (Blueprint $table) {
            $table->id('id_daftarMCU');
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_paketMCU');
            $table->string('nama_pasien', 100);
            $table->date('tanggal_lahir_pasien');
            $table->string('no_telp_pasien', 15);
            $table->enum('jenis_kelamin_pasien', ['Laki-laki', 'Perempuan']);
            $table->text('alamat_pasien');
            $table->text('riwayat_penyakit')->nullable();
            $table->date('tanggal_periksa');
            $table->timestamps();

            $table->foreign('id_pengguna')
                  ->references('id_pengguna')
                  ->on('pengguna')
                  ->onDelete('cascade');

            $table->foreign('id_paketMCU')
                  ->references('id_paketMCU')
                  ->on('paketmedicalcheckup')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaranmedicalcheckup');
    }
};
