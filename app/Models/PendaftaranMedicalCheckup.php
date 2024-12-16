<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranMedicalCheckup extends Model
{
    protected $table = 'pendaftaranmedicalcheckup';
    protected $primaryKey = 'id_daftarMCU';

    protected $fillable = [
        'id_pengguna', 
        'id_paketMCU', 
        'nama_pasien', 
        'tanggal_lahir_pasien', 
        'no_telp_pasien', 
        'jenis_kelamin_pasien', 
        'alamat_pasien', 
        'riwayat_penyakit', 
        'tanggal_periksa'
    ];

    // Relasi dengan Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    // Relasi dengan Paket Medical Checkup
    public function paketMCU()
    {
        return $this->belongsTo(PaketMedicalCheckup::class, 'id_paketMCU');
    }

    // PaketMedicalCheckup.php
public function layanan()
{
    return $this->hasMany(Layanan::class, 'id', 'id_layanan'); // Sesuaikan dengan kolom yang relevan
}
}